<?php

namespace Database\Factories;

use App\Models\Classroom;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ClassroomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Classroom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'tag_id' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9]),
            'is_private_code' => 1,
            'is_accept' => 1,
            'private_code' => strtoupper(Str::random(5)),
            'created_by' => Arr::random([1, 2, 3, 4, 5, 6, 7, 8, 9, 10])
        ];
    }
}
