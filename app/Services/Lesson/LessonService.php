<?php


namespace App\Services\Lesson;


use App\Models\Course;

class LessonService implements LessonServiceInterface
{

    public function handleShowLessonFE($course, $lesson)
    {

        $lesson = Course::query()->where('slug', $course)
            ->first()->chapterLesson()->where('slug', $lesson)->first();

        return $lesson;
    }
}
