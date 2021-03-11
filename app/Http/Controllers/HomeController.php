<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {

        //$courses = Course::all();
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);

        // return $courses; // Test return Courses collection

        //return Course::find(1)->getRatingAttribute(); // Test Course rating

        //return view('welcome');
        return view('welcome', compact('courses')); // Add collection to welcome view
    }
}
