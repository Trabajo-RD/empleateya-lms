<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Course;

// TODO: Implement model translations with astrotomic/laravel-translatable

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->get();

        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::orderBy('name')->get();

        return view('admin.categories.create', compact('topics'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);        

        $category = Category::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'modality_id' => $request->modality_id
        ]);

        // Register all category topics
        // $category_topics = Category::findOrFail($request->id);
        // $newCategory = $category_topics->replicate();

        // $newCategory->push();

        // foreach ($category_topics->topics as $topic) {
        //     $newCategory->topics()->attach($topic);
        // }        

        return redirect()->route('admin.categories.edit', compact('category'))->with('info', __('Category created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $topics = Topic::orderBy('name')->get();
        $courses = Course::all();
        $category_courses = $courses->where('status', 3)->where('category_id', $category->id);       

        return view('admin.categories.edit', compact('locale', 'category', 'topics', 'category_courses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $category->id
        ]);

        // $data = $request->all();

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'modality_id' => $request->modality_id
        ]);

        // Register all category topics
        // $category = Category::findOrFail($request->id);
        // $newCategory = $category->replicate();

        // $newCategory->push();

        // foreach ($category->topics as $topic) {
        //     $newCategory->topics()->attach($topic);
        // }

        return redirect()->route('admin.categories.edit', compact('category'))->with('info', __('The category has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('delete', 'success');
    }
}
