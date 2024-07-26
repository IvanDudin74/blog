<?php

namespace App\Http\Controllers\Admin\Post;

use App\Models\Post;

class DestroyController extends BaseController
{
    public function __invoke(Post $post) {
        try{
            $post->tags()->detach();
            $post->delete();
        } catch (\Exception $exception) {
            abort('404');
        }
        return redirect()->route('admin.post.index');
    }
}
