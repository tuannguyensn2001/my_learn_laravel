<?php


namespace App\Traits;


use App\Http\Resources\Frontend\UserResource;
use Illuminate\Support\Facades\Auth;

trait Response
{
    public function response($data, $status = \Illuminate\Http\Response::HTTP_OK): \Illuminate\Http\JsonResponse
    {
        return response()->json($data, $status);
    }

    public function responseErrorServer($message): \Illuminate\Http\JsonResponse
    {
        return $this->response([
            'data' => [],
            'message' => $message
        ], \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR);
    }

    public function responseErrorBadRequest($message): \Illuminate\Http\JsonResponse
    {
        return $this->response([
            'data' => [],
            'message' => $message,
        ], \Illuminate\Http\Response::HTTP_BAD_REQUEST);
    }

    public function responseWithToken(string $token): \Illuminate\Http\JsonResponse
    {
        return $this->response([
            'access_token' => $token,
            'user' => !is_null(Auth::user()) ? new UserResource(Auth::user()) : null,
            'time_expired' => Auth::factory()->getTTL() * 60,
        ]);
    }
}
