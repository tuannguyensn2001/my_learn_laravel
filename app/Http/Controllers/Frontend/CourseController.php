<?php

namespace App\Http\Controllers\Frontend;

use App\Exceptions\EntityNotFoundException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\CourseResource;
use App\Services\Course\CourseService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CourseController extends Controller
{

    private $service;

    public function __construct(CourseService $courseService)
    {
        $this->service = $courseService;
    }

    public function index(): JsonResponse
    {
        try {
            $result = $this->service->handleGetCourses();

            return $this->response([
                'data' => CourseResource::collection($result),
                'message' => 'Lấy thành công'
            ], Response::HTTP_OK);

        } catch (\Exception $exception) {

            return $this->responseErrorServer($exception->getMessage());
        }
    }

    public function show($slug): JsonResponse
    {
        try {
            $result = $this->service->handleShowCourseFE($slug);

            return $this->response([
                'data' => $result,
                'message' => 'Lấy thành công'
            ], Response::HTTP_OK);

        } catch (\Exception $exception) {
            if ($exception instanceof EntityNotFoundException) return $this->responseErrorBadRequest($exception->getMessage());
            return $this->responseErrorServer($exception->getMessage());
        }
    }
}
