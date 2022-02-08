<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function show(Tag $tag)
    {

        $courses = $tag->courses()
            ->where('status', 2)
            ->latest('id')
            ->paginate(8);

        return view('courses.tag', compact( 'courses', 'tag'));
    }
}
