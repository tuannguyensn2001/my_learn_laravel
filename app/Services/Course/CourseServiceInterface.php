<?php


namespace App\Services\Course;


interface CourseServiceInterface
{
    public function getDataForCreate();

    public function handleGetCourses();

    public function handleShowCourseFE(string $slug);
}
