<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Partner;

class HomeController extends Controller
{
    public function __invoke()
    {

        //$courses = Course::all();
        $courses = Course::where('status', '3')->latest('id')->get()->take(12);

        $partners = Partner::where('visible', '2')->get()->take(6);

        // return $courses; // Test return Courses collection

        //return Course::find(1)->getRatingAttribute(); // Test Course rating

        //return view('welcome');
        return view('welcome', compact('courses', 'partners')); // Add collection to welcome view
    }
}
