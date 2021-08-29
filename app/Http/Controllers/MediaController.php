<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function upload(Request $request)
    {
//        dd($request->file('file')->store("", "google"));
//        dd( Storage::disk('google')->putFile("/1F7t127mFYMtJxoZgzid6PxLjw2rgEjsU", $request->file('file')));
//        dd(Storage::disk('google')->put('test.txt', "Hello"));
        $contents = collect(Storage::disk('google')->listContents('/1F7t127mFYMtJxoZgzid6PxLjw2rgEjsU', true));

        dd($contents);
    }
}
