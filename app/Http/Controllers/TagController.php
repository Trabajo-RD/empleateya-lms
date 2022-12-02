<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        return view('tags.index');
    }

    public function show(Tag $tag)
    {

        // $courses = $tag->courses()
        //     ->where('status', 2)
        //     ->latest('id')
        //     ->paginate(8);

        return view('tags.show', compact('tag'));
    }
}
