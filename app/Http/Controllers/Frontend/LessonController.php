<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\Lesson\LessonServiceInterface;
use Illuminate\Http\Request;

class LessonController extends Controller
{

    private $service;

    public function __construct(LessonServiceInterface $lessonService)
    {
        $this->service = $lessonService;
    }

    public function show($course, $lesson): \Illuminate\Http\JsonResponse
    {
        try {
            $result = $this->service->handleShowLessonFE($course, $lesson);
            return $this->response([
                'data' => $result,
                'message' => 'Thành công'
            ]);
        } catch (\Exception $exception) {
            return $this->responseErrorServer($exception->getMessage());
        }
    }
}
