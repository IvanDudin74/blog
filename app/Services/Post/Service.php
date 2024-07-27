<?php

namespace App\Services\Post;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class Service
{
    public function store($data) {
        try {
            DB::beginTransaction();
            $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            if (isset($data['tag_ids'])) {
                $tag_ids = $data['tag_ids'];
                unset($data['tag_ids']);
                $post = Post::firstOrcreate($data);
                $post->tags()->attach($tag_ids);
            }
            else {
                $post = Post::firstOrcreate($data);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function update($data, $post) {
        try {
            DB::beginTransaction();
            if (isset($data['main_image'])) {
                $data['main_image'] = Storage::disk('public')->put('/images', $data['main_image']);
            }
            if (isset($data['preview_image'])) {
                $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);
            }
            if (isset($data['tag_ids'])) {
                $post->tags()->sync($data['tag_ids']);
                unset($data['tag_ids']);
            }
            else {
                $post->tags()->detach();
            }
            $post->update($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
