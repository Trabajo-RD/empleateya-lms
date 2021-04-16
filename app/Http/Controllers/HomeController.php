<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Partner;
use Illuminate\Support\Facades\Config;
use App\Models\Review;

use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    private $locale;

    public function __invoke()
    {

        $courses = Course::all();

        // All publish courses
        $publish_courses = Course::where('status', '3');

        $latest_courses = $publish_courses->latest('updated_at')->get()->take(12); // Latest publish courses

        $partners = Partner::where('visible', '2')->get()->take(6);


        //$featured_courses = $courses->getRatingAttribute();

        // return $courses; // Test return Courses collection

        //return Course::find(1)->getRatingAttribute(); // Test Course rating

        //return view('welcome');


        // $app = Config::get('app');

        // $locale = $app['available_locales'];

        return view('welcome', compact('latest_courses', 'partners')); // Add collection to welcome view
    }

    public function dashboard(){
        return view('dashboard');
    }
}
