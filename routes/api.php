<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => '/backend/v1'], function () {

    Route::post('/upload', [\App\Http\Controllers\Backend\UploadController::class, 'upload']);

    Route::get('/courses/create', [\App\Http\Controllers\Backend\CourseController::class, 'create']);
    Route::get('/courses/{id}', [\App\Http\Controllers\Backend\CourseController::class, 'show']);

    Route::post('/courses', [\App\Http\Controllers\Backend\CourseController::class, 'store']);
//    Route::get('/lessons/{course_id}', [\App\Http\Controllers\Backend\LessonController::class, 'show']);


});

Route::get('/test', function () {
    broadcast(new \App\Events\CommentLessonEvent());
//    return response()->json([1]);
});

Route::group(['prefix' => '/v1'], function () {
    Route::get('/courses', [\App\Http\Controllers\Frontend\CourseController::class, 'index']);
    Route::get('/course/{slug}', [\App\Http\Controllers\Frontend\CourseController::class, 'show']);
    Route::get('/lesson/show/{course}/{lesson}', [\App\Http\Controllers\Frontend\LessonController::class, 'show']);

    Route::get('/tags', [\App\Http\Controllers\Frontend\TagController::class, 'index']);

    Route::post('/auth/login', [\App\Http\Controllers\Frontend\AuthController::class, 'login']);

    Route::get('/auth/refresh', [\App\Http\Controllers\Frontend\AuthController::class, 'refresh']);
    Route::group(['middleware' => 'jwt_frontend'], function () {
        Route::get('/auth/me', [\App\Http\Controllers\Frontend\AuthController::class, 'me']);


        Route::group(['prefix' => 'classrooms'], function () {
            Route::get('/', [\App\Http\Controllers\Frontend\ClassroomController::class, 'index']);
            Route::post('/', [\App\Http\Controllers\Frontend\ClassroomController::class, 'store']);
            Route::post('/{id}/join', [\App\Http\Controllers\Frontend\ClassroomController::class, 'join']);
            Route::get('/{id}', [\App\Http\Controllers\Frontend\ClassroomController::class, 'show']);
            Route::get('/{id}/users', [\App\Http\Controllers\Frontend\ClassroomController::class, 'getUsers']);
            Route::put('/{classroom_id}/approve/{user_id}', [\App\Http\Controllers\Frontend\ClassroomController::class, 'approveUser']);
        });

    });
});
