<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function __invoke() {
        return view('personal.comment.edit');
    }
}
