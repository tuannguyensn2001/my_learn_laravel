<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function show($course_id)
    {
        return Course::find($course_id);
    }
}

