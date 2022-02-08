<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Topic;
use App\Models\Tag;

class TopicController extends Controller
{
    public function show(Category $category, Topic $topic)
    {

        // return topic;
        $tags = Tag::where('topic_id', $topic->id)->get();

        return view('courses.topic', compact( 'category', 'topic', 'tags'));
    }
}
