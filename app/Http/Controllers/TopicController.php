<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Tag;
use App\Models\Course;

class TopicController extends Controller
{
    public function index(){
        return view('topics.index');
    }

    public function show(Topic $topic)
    {
        $courses = Course::where('topic_id', $topic->id);
        // return topic;
        // $tags = Tag::where('topic_id', $topic->id)->get();

        return view('topics.show', compact('topic', 'courses'));
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function getByCategory(Request $request) {
        $topics = Topic::where('category_id', $request->category_id)
            ->get();

        if (count($topics) > 0) {
            return response()->json($topics);
        }        
    }
}
