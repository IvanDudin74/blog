<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data) {
        try {
            //DB::beginTransaction();
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            $tag_ids = $data['tag_ids'];
            unset($data['tag_ids']);
            $post = Post::firstOrcreate($data);
            $post->tags()->attach($tag_ids);
            //DB::commit();
        } catch (\Exception $exception) {
            //DB::rollBack();
            //dd($exception->getMessage());
            abort('404');
        }
    }
}
