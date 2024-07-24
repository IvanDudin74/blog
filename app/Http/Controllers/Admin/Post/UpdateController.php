<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Category $category) {
        $data = $request->validated();
        $category->update($data);
        return redirect()->route('admin.category.show', $category->id);
    }
}
