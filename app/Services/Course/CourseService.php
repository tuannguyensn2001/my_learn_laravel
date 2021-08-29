<?php


namespace App\Services\Course;


use App\Defines\Level;
use App\Defines\Status;
use App\Exceptions\EntityNotFoundException;
use App\Models\Course;
use App\Models\Tag;
use Illuminate\Database\QueryException;

class CourseService implements CourseServiceInterface
{

    public function getDataForCreate(): \stdClass
    {
        $result = new \stdClass();

        $result->level = Level::get();
        $result->tags = Tag::all();
        $result->status = Status::get();

        return $result;
    }

    public function handleGetCourses()
    {
        return Course::with('tag', 'media', 'tag.category')->get();
    }


    /**
     * @throws EntityNotFoundException
     */
    public function handleShowCourseFE(string $slug)
    {

        $course = Course::query()->slug($slug)->first();

        if (is_null($course)) throw new EntityNotFoundException();


        $course->load([
            'chapters' => function ($query) {
                return $query->orderBy('order');
            },
            'chapters.lessons' => function ($query) {
                return $query->orderBy('order');
            }
        ]);

        return $course;
    }

    /**
     * @throws \Exception
     */
    public function handleCreateCourseBE(array $course)
    {
        $course['media_id'] = 1;
        return Course::create($course);
    }
}
