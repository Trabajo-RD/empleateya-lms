<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Partner;
use App\Models\Slide;
use Illuminate\Support\Facades\Config;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    private $user;

    public function __invoke()
    {

        $courses = Course::all();
        $slides = Slide::all();

        $publish_slides = Slide::where('status', '2')->get();

        if (Auth::user()) {
            $this->user = request()->user()->id;
        }

        // All publish courses
        $publish_courses = Course::where('status', '3');

        $latest_courses = $publish_courses->latest('updated_at')->get()->take(12); // Latest publish courses

        $partners = Partner::where('status', '2')->get()->take(6);

        $user_courses = DB::table('courses')
            ->join('course_user','courses.id', '=', 'course_user.course_id')
            ->join('users', 'courses.user_id', '=', 'users.id')
            ->join('categories', 'courses.category_id', '=', 'categories.id')
            ->leftjoin('images', 'images.imageable_id', '=', 'courses.id')
            ->select(
                'courses.id',
                'courses.title as title',
                'courses.slug AS slug',
                'users.name AS name',
                'users.lastname AS lastname',
                'categories.name AS category',
                'images.url AS image'
            )
            ->where('course_user.user_id', '=', $this->user)
            ->groupBy(
                'courses.id',
                'courses.title',
                'courses.slug',
                'users.name',
                'users.lastname',
                'categories.name',
                'images.url'
            )
            ->orderBy('courses.id', 'desc')
            ->limit(3)
        ->get();

        $carousel_items = [
            [
                'image' => 'images/home/slider/hero2.jpg',
                'title' => 'Free courses',
                'subtitle' => '',
                'content' => 'In our Learning Management System you will find courses and articles from different areas that will help you in your professional development',
                'slug' => 'free-courses',
                'title_color' => 'text-white',
                'content_color' => 'text-white',
            ],
            [
                'image' => 'images/home/slider/hero4.jpg',
                'title' => 'Face-to-Face courses',
                'subtitle' => '',
                'content' => 'See all Face-to-Face courses',
                'slug' => 'face-to-face-courses',
                'title_color' => 'text-blue-900',
                'content_color' => 'text-blue-900',
            ],


        ];


        $featured_courses = [];

        $featured_modalities = [];

        // return $courses; // Test return Courses collection

        //return Course::find(1)->getRatingAttribute(); // Test Course rating

        //return view('welcome');


        // $app = Config::get('app');

        // $locale = $app['available_locales'];

        // $agent = new Agent();

        return view('welcome', compact('latest_courses', 'publish_slides', 'carousel_items', 'featured_courses', 'featured_modalities', 'user_courses', 'partners')); // Add collection to welcome view
    }

    // public function dashboard(){
    //     return view('dashboard');
    // }

}
