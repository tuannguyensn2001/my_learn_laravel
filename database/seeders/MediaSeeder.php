<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('media')->insert([
            [
                'name' => 'react',
                'path' => 'https://bs-uploads.toptal.io/blackfish-uploads/blog/post/seo/og_image_file/og_image/16097/react-context-api-4929b3703a1a7082d99b53eb1bbfc31f.png',
                'type' => 'png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => 'saitama',
                'path' => 'https://scontent.fhan5-2.fna.fbcdn.net/v/t1.6435-9/206456407_2902913926642881_1938351864490439175_n.jpg?_nc_cat=110&ccb=1-4&_nc_sid=09cbfe&_nc_ohc=wNjK9IH79LAAX-4Zv0Q&_nc_ht=scontent.fhan5-2.fna&oh=14a27c89bee02e21b25f3e8f116d3c80&oe=613A0837',
                'type' => 'png',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
