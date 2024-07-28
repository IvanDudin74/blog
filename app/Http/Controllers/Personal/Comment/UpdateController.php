<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;

class UpdateController extends Controller
{
    public function __invoke() {
        return redirect()->route('personal.comment.index');
    }
}
