<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;

class CategoryController extends Controller
{
    public function show(Category $category)
    {

        // return $category;
        $topics = Topic::where('category_id', $category->id)->get();

        return view('courses.category', compact( 'category', 'topics'));
    }
}
