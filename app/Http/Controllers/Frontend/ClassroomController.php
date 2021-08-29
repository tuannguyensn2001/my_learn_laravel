<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $classroom = $request->only('name', 'is_private_code', 'private_code', 'is_accept', 'tag_id');

        $classroom['created_by'] = auth()->user()->id;

        try {
            $classroom = Classroom::create($classroom);
        } catch (\Exception $exception) {
            return $this->responseErrorBadRequest($exception->getMessage());
        }

        return $this->response([
            'message' => 'Tao lop moi thanh cong',
            'data' => $classroom
        ]);
    }
}
