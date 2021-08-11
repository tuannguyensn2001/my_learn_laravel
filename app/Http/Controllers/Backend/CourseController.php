<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CourseCreate;
use App\Http\Resources\Backend\CourseCreateResource;
use App\Services\Course\CourseServiceInterface;
use Illuminate\Http\Response;


class CourseController extends Controller
{


    private $service;

    public function __construct(CourseServiceInterface $courseService)
    {
        $this->service = $courseService;
    }

    public function create(): \Illuminate\Http\JsonResponse
    {

        try {
            $data = $this->service->getDataForCreate();

            return $this->response([
                'message' => trans('message.fetch_data_success'),
                'data' => new CourseCreateResource($data)
            ], Response::HTTP_OK);

        } catch (\Exception $exception) {
            return $this->response([
                'message' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

}
