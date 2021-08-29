<?php

namespace Database\Seeders;

use App\Defines\ClassroomRole;
use App\Defines\ClassroomStatus;
use App\Models\Classroom;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Classroom::factory()->count(100)->create();

        $data = [];

        for ($i = 1; $i <= 10; $i++) {

            $role = ClassroomRole::_STUDENT;
            $status = Arr::random([ClassroomStatus::_APPROVE, ClassroomStatus::_PENDING, ClassroomStatus::_HOST]);

            if ($status === ClassroomStatus::_HOST) $role = ClassroomRole::_TEACHER;

            array_push($data, [
                'classroom_id' => intval(rand(1, 100)),
                'user_id' => intval(rand(1, 100)),
                'status' => $status,
                'role' => $role,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        DB::table('classroom_user')->insert($data);

    }
}
