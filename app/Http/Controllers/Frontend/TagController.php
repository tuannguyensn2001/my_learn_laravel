<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->response([
            'data' => Tag::all(),
            'message' => 'Thành công'
        ]);
    }
}
