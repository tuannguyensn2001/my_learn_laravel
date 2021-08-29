<?php

namespace App\Http\Controllers\Frontend;

use App\Defines\ClassroomRole;
use App\Defines\ClassroomStatus;
use App\Exceptions\EntityFoundException;
use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\User;
use Illuminate\Contracts\Queue\EntityNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $classroom = $request->only('name', 'is_private_code', 'private_code', 'is_accept', 'tag_id');

        $classroom['created_by'] = auth()->user()->id;

        $private_code = $classroom['private_code'];


        try {

            if (!!Classroom::privateCode($private_code)->first()) {
                throw new EntityFoundException('Mã lớp này đã tồn tại');
            }


            DB::beginTransaction();

            $classroom = Classroom::create($classroom);


            auth()->user()->classrooms()->attach($classroom->id, [
                'role' => ClassroomRole::_TEACHER,
                'status' => ClassroomStatus::_HOST
            ]);

            DB::commit();

        } catch (\Exception $exception) {
            DB::rollBack();
            return $this->responseErrorBadRequest($exception->getMessage());
        }

        return $this->response([
            'message' => 'Tao lop moi thanh cong',
            'data' => $classroom
        ]);
    }

    public function index(): \Illuminate\Http\JsonResponse
    {
        $data = auth()->user()->classrooms()->where('role', ClassroomRole::_TEACHER)->get();

        return $this->response([
            'message' => ' Done',
            'data' => $data
        ]);
    }

    public function join($id)
    {
        try {
            $classroom = Classroom::find($id);

            if (!$classroom) throw new \App\Exceptions\EntityNotFoundException('Không tồn tại lớp học này');

            $user_id = auth()->user()->id;

            if (!!$classroom->users()->where('user_id', $user_id)->first()) throw new EntityFoundException('Đã tồn tại yêu cầu này');

            $classroom->users()->attach($user_id, [
                'role' => ClassroomRole::_STUDENT,
                'status' => ClassroomStatus::_PENDING
            ]);

            return $this->response([
                'message' => 'Gửi yêu cầu thành công'
            ]);


        } catch (\Exception $exception) {
            return $this->responseErrorBadRequest($exception->getMessage());
        }
    }

    public function show($id): \Illuminate\Http\JsonResponse
    {
        try {
            $classroom = Classroom::find($id);

            if (!$classroom) throw new \App\Exceptions\EntityNotFoundException('Không tồn tại lớp học này');

            return $this->response([
                'message' => 'Thành công',
                'data' => $classroom
            ]);

        } catch (\Exception $exception) {
            return $this->responseErrorBadRequest($exception);
        }
    }

    public function getUsers($id): \Illuminate\Http\JsonResponse
    {
        try {
            $classroom = Classroom::find($id);

            if (!$classroom) throw new \App\Exceptions\EntityNotFoundException('Không tồn tại lớp học này');

            $status = ClassroomStatus::_APPROVE;


            if (\request()->has('_status') && \request()->query('_status') === ClassroomStatus::_PENDING) {
                $status = \request()->query('_status');
            }
            $users = $classroom->users()->where('status', $status)->get();

            return $this->response([
                'message' => 'Lấy thành công',
                'data' => $users
            ]);

        } catch (\Exception $exception) {
            return $this->responseErrorBadRequest($exception);
        }
    }

    public function approveUser($classroom_id, $user_id): \Illuminate\Http\JsonResponse
    {

        try {
            $classroom = Classroom::find($classroom_id);

            if (!$classroom) throw new \App\Exceptions\EntityNotFoundException('Không tồn tại lớp học này');

            if (!User::find($user_id)) throw new \App\Exceptions\EntityNotFoundException('Không tồn tại người dùng này');

            if (!$classroom->users()->where('user_id', auth()->user()->id)->where('status', 'HOST')->first())
                throw new \Exception('Không phải là chủ lớp');

            if ($classroom->users()->where('user_id',$user_id)->where('status',ClassroomStatus::_APPROVE)->first())
                throw new \Exception('Đã chấp thuận rồi');

            $classroom->users()->where('user_id', $user_id)->update(['status' => ClassroomStatus::_APPROVE]);

            return $this->response([
                'message' => 'Thành công rồi'
            ]);


        } catch (\Exception $exception) {
            return $this->responseErrorBadRequest($exception->getMessage());
        }
    }

}
