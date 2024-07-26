<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Category\UpdateRequest;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Post $post) {
        $data = $request->validated();
        $this->service->update($data);
        return redirect()->route('admin.post.show', $post->id);
    }
}
