<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChapterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chapters')->insert([
            // Lap trinh
            // JS
            [
                'name' => 'Mở đầu về Javascript',
                'order' => 1,
                'course_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kiến thức cơ bản',
                'order' => 2,
                'course_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nâng cao về Javascript',
                'order' => 3,
                'course_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // NodeJS
            [
                'name' => 'Mở đầu về NodeJS',
                'order' => 1,
                'course_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Mô hình MVC',
                'order' => 2,
                'course_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nâng cao về NodeJS',
                'order' => 3,
                'course_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // OOP
            [
                'name' => 'Hướng đối tượng là gì',
                'order' => 1,
                'course_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Kiến thức cơ bản',
                'order' => 2,
                'course_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Nâng cao về lập trình hướng đối tượng',
                'order' => 3,
                'course_id' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Toan hoc
            // Toan cap 3 -- Toan 10
            [
                'name' => 'Mở đầu về Toán 10',
                'order' => 1,
                'course_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Khối kiến thức chung',
                'order' => 2,
                'course_id' => 4,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Toan cap 3 -- Toan 11
            [
                'name' => 'Mở đầu về toán 11',
                'order' => 1,
                'course_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Khối kiến thức chung',
                'order' => 2,
                'course_id' => 5,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Toan cap 3 -- Toan 12
            [
                'name' => 'Mở đầu về toán 12',
                'order' => 1,
                'course_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Khối kiến thức chung',
                'order' => 2,
                'course_id' => 6,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Dai so
            [
                'name' => 'Không gian Vector R',
                'order' => 1,
                'course_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Ma trận - Định thức',
                'order' => 2,
                'course_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Hệ phương trình tuyến tính',
                'order' => 3,
                'course_id' => 7,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Giai tich
            [
                'name' => 'Chương 1',
                'order' => 1,
                'course_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chương 2',
                'order' => 2,
                'course_id' => 8,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Ly thuyet on dinh
            [
                'name' => 'Chương 1',
                'order' => 1,
                'course_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chương 2',
                'order' => 2,
                'course_id' => 9,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Giai tich phi tuyen
            [
                'name' => 'Chương 1',
                'order' => 1,
                'course_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chương 2',
                'order' => 2,
                'course_id' => 10,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],


            // Kinh te
            // Kinh te chinh tri
            [
                'name' => 'Đối tượng, phương pháp nghiên cứu',
                'order' => 1,
                'course_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chức năng của kinh tế chính trị',
                'order' => 2,
                'course_id' => 11,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Kinh te quoc te
            [
                'name' => 'Chương 1',
                'order' => 1,
                'course_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chương 2',
                'order' => 2,
                'course_id' => 12,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // Kinh te vi mo
            [
                'name' => 'Chương 1',
                'order' => 1,
                'course_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Chương 2',
                'order' => 2,
                'course_id' => 13,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
