<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        $token = Auth::attempt($credentials);

        if (!$token) {
            return $this->responseErrorBadRequest('Thông tin đăng nhập không hợp lệ');
        }

        return $this->responseWithToken($token);
    }

    public function me(): JsonResponse
    {
        return $this->response([
            'data' => new UserResource(Auth::user()),
            'message' => 'Lấy thông tin thành công'
        ]);
    }

    public function refresh(): JsonResponse
    {
        try {
            $token = \auth()->refresh(false, true);
            return $this->responseWithToken($token);
        } catch (\Exception $exception) {
            return $this->responseErrorBadRequest($exception->getMessage());
        }
    }
}
