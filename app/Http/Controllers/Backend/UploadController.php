<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\Upload\UploadService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UploadController extends Controller
{

    private $service;


    public function __construct(UploadService $uploadService)
    {
        $this->service = $uploadService;
    }


    public function upload(Request $request): JsonResponse
    {

        try {
            $data['file'] = $request->file('file');

            $data['type'] = $request->get('type');

            $result = $this->service->handleUploadFile($data);

            return $this->response([
                'data' => $result
            ], Response::HTTP_OK);

        } catch (\Exception $exception) {
            return $this->response([
                'message' => $exception->getMessage()
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

}
