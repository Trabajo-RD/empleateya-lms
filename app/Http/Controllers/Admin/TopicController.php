<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Tag;

class TopicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $topics = Topic::all();

        return view('admin.topics.index', compact('topics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $category_list = [
            '0' => '-- Seleccione una categoría --',
        ];

        foreach ($categories as $category) {
            $category_list = Arr::add($category_list, $category->id, $category->name);
        }

        // $tags = Tag::orderBy('name')->get();

        return view('admin.topics.create', compact('category_list'));
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
            'slug' => 'required|unique:topics',
            'category_id' => 'required'
        ]);

        $topic = Topic::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'category_id' => $request->category_id
        ]);

        // $topic_tags = Topic::findOrFail($request->id);
        // $newTopic = $topic_tags->replicate();

        // $newTopic->push();

        // foreach ($topic_tags->tags as $tag) {
        //     $newTopic->tags()->attach($tag);
        // }

        return redirect()->route('admin.topics.edit', compact('topic'))->with('info', __('Topic created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Topic $topic)
    {
        return view('admin.topics.show', compact('topic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Topic $topic)
    {
        $categories = Category::orderBy('name')->get();
        $category_list = [];

        foreach ($categories as $category) {
            $category_list = Arr::add($category_list, $category->id, $category->name);
        }

        // $tags = Tag::orderBy('name')->get();

        return view('admin.topics.edit', compact('category_list', 'topic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Topic $topic)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:topics,slug,' . $topic->id,
            'category_id' => 'required'
        ]);

        $topic->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('admin.topics.edit', compact('topic'))->with('info', __('The topic has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Topic $topic)
    {
        $topic->delete();

        return redirect()->route('admin.topics.index')->with('delete', 'success');
    }
}
