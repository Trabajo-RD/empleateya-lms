<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Review;
use App\Models\Course;

class AdminDashboard extends Controller
{

    public function index() {
        $users = User::all();
        $reviews = Review::all();
        $latest_users = User::orderBy('created_at', 'desc')->take(8)->get();
        $published_courses = Course::where('status', 3)->get();
        $new_courses = Course::orderBy('created_at', 'desc')->take(5)->get();
        $revision_courses = Course::where('status', 2)->take(5)->get();
        $males = User::where('gender', 'M')->get();
        $females = User::where('gender', 'F')->get();

        //return $request;
        return view('admin.index', compact('users', 'reviews', 'males', 'females', 'published_courses', 'new_courses', 'latest_users', 'revision_courses'));
    }
}
