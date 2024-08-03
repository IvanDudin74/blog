<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Filters\PostFilter;
use App\Http\Requests\Post\FilterRequest;
use App\Jobs\SomeJob;
use App\Models\Category;
use App\Models\Post;
use http\Env\Request;

class IndexController extends Controller
{
    public function __invoke(FilterRequest $request) {
        $data = $request->validated();
        //dump($data);
        $filter = app()->make(PostFilter::class, ['queryParams' => array_filter($data)]);
        //dump($filter);
        //$posts = Post::filter($filter)->get();//paginate(3);
        $posts = Post::filter($filter)->get();//paginate(3);
        $categories = Category::all();
        $randomPosts = Post::get()->random(2);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(3);
        return view('post.index', compact('posts', 'randomPosts', 'likedPosts', 'categories'));
    }
}
