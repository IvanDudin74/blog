<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Comment\StoreRequest;
use App\Models\Comment;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request) {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id;
        //dd($data);
        Comment::create($data);
        return redirect()->route('post.show', $data['post_id']);
    }
}
