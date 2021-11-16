<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\Course;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('name')->get();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $topics = Topic::orderBy('name')->get();
        $topic_list = [
            '0' => '-- Seleccione una subcategoría --',
        ];

        foreach ($topics as $topic) {
            $topic_list = Arr::add($topic_list, $topic->id, $topic->name);
        }

        return view('admin.tags.create', compact('topic_list'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $locale)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'topic_id' => 'required'
        ]);

        $tag = Tag::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'topic_id' => $request->topic_id
        ]);

        return redirect()->route('admin.tags.edit', compact('locale', 'tag'))->with('info', __('Tag created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($locale, Tag $tag)
    {
        $topics = Topic::orderBy('name')->get();          

        $topic_list = [];

        foreach ($topics as $topic) {
            $topic_list = Arr::add($topic_list, $topic->id, $topic->name);
        }

        return view('admin.tags.edit', compact('tag', 'topic_list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $locale, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags,slug,' . $tag->id,
            'topic_id' => 'required'
        ]);

        $tag->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'icon' => $request->icon,
            'topic_id' => $request->topic_id
        ]);

        return redirect()->route('admin.tags.edit', compact('locale', 'tag'))->with('info', __('The tag has been updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($locale, Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('delete', 'success');
    }
}
