<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data) {
        dd($data);
        try {
            DB::beginTransaction();
            $data['main_image'] = Storage::put('/images', $data['main_image']);
            $data['preview_image'] = Storage::put('/images', $data['preview_image']);
            $post = Post::firstOrcreate($data);
            $tag_ids = $data['tag_ids'];
            unset($data['tag_ids']);
            $post->tags()->attach($tag_ids);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            //return $exception->getMessage();
        }
    }
}
