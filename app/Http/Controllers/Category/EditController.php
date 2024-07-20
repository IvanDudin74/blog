<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(Category $category) {
        //$category = Category::find($category);
        return view('category.edit', compact('category'));
    }
}
