<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'tuannguyensn2001';
        $user->email = 'devpro2001@gmail.com';
        $user->password = Hash::make('java2001');
        $user->save();
//        Profile::create([
//            'user_id' => $user->id,
//            'fullname' => 'Tuấn Nguyễn',
//            'media_id' => 2,
//            'address' => 'Viet Nam'
//        ]);

        User::factory()->count(100)->create();
    }
}
