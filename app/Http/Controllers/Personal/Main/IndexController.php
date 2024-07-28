<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke() {
        $data =[];
        $data['likedPostsCount'] = auth()->user()->likedPosts->count();
        return view('personal.main.index', compact('data'));
    }
}
