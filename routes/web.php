<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/upload', function (\Illuminate\Http\Request $request) {

    $uploadedFileUrl = Cloudinary::upload($request->file('file')->getRealPath())->getSecurePath();
    dd($uploadedFileUrl);
})->name('upload');

Route::get('/{any}', function () {

    return view('welcome');
})->where('any', '.*');

//Route::post('/upload', [\App\Http\Controllers\MediaController::class, 'upload']);
