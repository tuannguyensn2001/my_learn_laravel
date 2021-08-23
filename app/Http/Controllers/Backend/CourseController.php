<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Backend\CourseCreate;
use App\Http\Resources\Backend\CourseCreateResource;
use App\Models\Course;
use App\Services\Course\CourseServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


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
            ]);

        } catch (\Exception $exception) {
            return $this->response([
                'message' => $exception->getMessage()
            ], ResponseAlias::HTTP_INTERNAL_SERVER_ERROR);
        }

    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->only('name', 'slug', 'description', 'tag_id', 'level', 'status', 'price');

        try {
            $result = $this->service->handleCreateCourseBE($data);
            return $this->response([
                'data' => $result,
                'message' => 'Thêm mới thành công'
            ]);
        } catch (\Exception $exception) {
            return $this->responseErrorServer($exception->getMessage());
        }
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {

        $result = Course::find($id);

        if (\request()->has('_lessons') && boolval(\request()->query('_lessons'))) {
            $result = $result->load(
                [
                    'chapters' => function ($query) {
                        $query->with(['lessons' => function ($query) {
                            return $query->orderBy('order');
                        }]);
                        $query->orderBy('order');
                    }
                ]
            );
//            )->
//            load([
//                'chapters.lessons' => function ($query) {
//                    return $query->orderBy('order');
//                }
//            ]);
        }


        return $this->response([
            'data' => $result,
            'message' => 'Lấy thông tin thành công'
        ]);
    }

}
