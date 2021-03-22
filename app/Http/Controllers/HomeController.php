<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Partner;
use App\Models\Review;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {

        $courses = Course::all();

        $publish_courses = Course::where('status', '3'); // All publish courses

        $latest_courses = $publish_courses->latest('id')->get()->take(12); // Latest publish courses

        $partners = Partner::where('visible', '2')->get()->take(6);


        //$featured_courses = $courses->getRatingAttribute();

        // return $courses; // Test return Courses collection

        //return Course::find(1)->getRatingAttribute(); // Test Course rating

        //return view('welcome');
        return view('welcome', compact('latest_courses', 'partners')); // Add collection to welcome view
    }
}
