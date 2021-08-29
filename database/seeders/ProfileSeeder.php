<?php

namespace Database\Seeders;

use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        Profile::factory()->count(101)->create();

        for ($i = 1; $i <= 101; $i++) {
            Profile::create([
                'user_id' => $i,
                'fullname' => 'Tuấn Nguyễn',
                'media_id' => 2,
                'address' => 'Viet Nam'
            ]);
        }
    }
}
