<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Course;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        $category = new Category;
        $courses = $category->courses();

        return view('categories.index', compact('categories', 'category', 'courses'));
    }

    public function show(Category $category)
    {
        return view('courses.category', [
            'category' => $category
        ]);
    }
}
