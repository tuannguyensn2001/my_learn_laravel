<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('courses')->insert([
            // Lap trinh
            [
                'name' => 'Lập trình Javascript',
                'slug' => Str::slug('Lập trình Javascript','-'),
                'description' => 'Học về javascript',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 1,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lập trình NodeJS',
                'slug' => Str::slug('Lập trình NodeJS','-'),
                'description' => 'Học về nodejs',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 2,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lập trình hướng đối tượng',
                'slug' => Str::slug('Lập trình hướng đối tượng','-'),
                'description' => 'Cơ bản, khái quát về lập trình hướng đối tượng',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 3,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Toan hoc
            [
                'name' => 'Toán lớp 10',
                'slug' => Str::slug('Toán lớp 10','-'),
                'description' => 'Học về toán lớp 10',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 4,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Toán lớp 11',
                'slug' => Str::slug('Toán lớp 11','-'),
                'description' => 'Học về toán lớp 11',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 4,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Toán lớp 12',
                'slug' => Str::slug('Toán lớp 12','-'),
                'description' => 'Học về toán lớp 12',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 4,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Đại số',
                'slug' => Str::slug('Đại số','-'),
                'description' => 'Cơ bản và nâng cao về môn đại số tuyến tính',
                'price' => 1000,
                'level' => 'MEDIUM',
                'media_id' => 1,
                'tag_id' => 5,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Giải tích',
                'slug' => Str::slug('Giải tích','-'),
                'description' => 'Cơ bản và nâng cao về giải tích',
                'price' => 1000,
                'level' => 'MEDIUM',
                'media_id' => 1,
                'tag_id' => 5,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Lý thuyết ổn định',
                'slug' => Str::slug('Lý thuyết ổn định','-'),
                'description' => 'Chuyên sâu về lý thuyết ổn định trong toán ứng dụng',
                'price' => 10000,
                'level' => 'HARD',
                'media_id' => 1,
                'tag_id' => 6,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Giải tích phi tuyến',
                'slug' => Str::slug('Giải tích phi tuyến','-'),
                'description' => 'Chuyên sâu về giải tích phi tuyến',
                'price' => 10000,
                'level' => 'HARD',
                'media_id' => 1,
                'tag_id' => 6,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Kinh te
            [
                'name' => 'Kinh tế chính trị',
                'slug' => Str::slug('Kinh tế chính trị','-'),
                'description' => 'Cơ bản về môn kinh tế chính trị',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 7,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kinh tế quốc tế',
                'slug' => Str::slug('Kinh tế quốc tế','-'),
                'description' => 'Cơ bản về môn kinh tế quốc tế',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 8,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kinh tế vi mô',
                'slug' => Str::slug('Kinh tế vi mô','-'),
                'description' => 'Cơ bản về môn kinh tế vi mô',
                'price' => 1000,
                'level' => 'EASY',
                'media_id' => 1,
                'tag_id' => 9,
                'status' => 'PUBLISH',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
