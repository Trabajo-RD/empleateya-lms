<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\LearningPath;
use App\Models\Workshop;
use App\Models\Organization;
use App\Models\Slide;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Support\Facades\Config;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;




use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{

    private $user;

    /**
     * return only one route
     */
    public function __invoke()
    {
        // return all courses
        $courses = Course::where('status', '=', 3)->latest()->get()->take(12);

        // return all leaning paths
        $learning_paths = LearningPath::where('status', '=', 3)->get()->take(9);

        // return all workshops
        // $q = Workshop::latest()->take(4)->get();
        $now = date('Y-m-d');
        $workshops = Workshop::where('status', 3)->latest('id')->get()->take(12);
        $workshops_timeline = Workshop::where('start_date', '>=', $now)->get()->take(12);

        //dd($workshops_timeline);

        // $published_workshops = $workshops->where('status', Workshop::PUBLISH)->take(8);

        //return $published_workshops;




        // return all categories
        $categories = Category::randomCategories();
        // $categories = Category::randomCategories()->take(12);

        // return all categories with topics
        $categories_and_topics = Category::with('topics')->get();

        // $slides = Slide::all();

        $publish_slides = Slide::where('status', 2)->get();

        if (Auth::user()) {
            $this->user = User::find(auth()->user()->id);
        }

        // All publish courses
        $publish_courses = Course::where('status', '3');

        $latest_courses = $publish_courses->type(4)->latest('id')->get()->take(12); // Latest publish courses

        $partners = Organization::where('status', 1)->where('is_partnership', true)->get()->take(6);

        // $user_courses = DB::table('courses')
        //     ->join('course_user','courses.id', '=', 'course_user.course_id')
        //     ->join('users', 'courses.user_id', '=', 'users.id')
        //     ->leftjoin('images', 'images.imageable_id', '=', 'courses.id')
        //     ->select(
        //         'courses.id',
        //         'courses.title as title',
        //         'courses.slug AS slug',
        //         'users.name AS name',
        //         'users.lastname AS lastname',
        //         'images.url AS image'
        //     )
        //     ->where('course_user.user_id', '=', $this->user)
        //     ->groupBy(
        //         'courses.id',
        //         'courses.title',
        //         'courses.slug',
        //         'users.name',
        //         'users.lastname',
        //         'images.url'
        //     )
        //     ->orderBy('courses.id', 'desc')
        //     ->limit(3)
        // ->get();

        if (Auth::user()){
            $user_courses = User::find(auth()->user()->id)->courses_enrolled;
            $user_courses = $user_courses->take(3);
        } else {
            $user_courses = null;
        }

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


        $top_rated_courses = Course::with('topRatedCourses')->where('status', 3)->get()->take(10);

        $featured_modalities = [];

        // return $courses; // Test return Courses collection

        //return Course::find(1)->getRatingAttribute(); // Test Course rating

        //return view('welcome');


        // $app = Config::get('app');

        // $locale = $app['available_locales'];

        // $agent = new Agent();

        return view('welcome', compact('workshops', 'workshops_timeline', 'categories', 'learning_paths', 'latest_courses', 'publish_slides', 'carousel_items', 'top_rated_courses', 'featured_modalities', 'user_courses', 'partners')); // Add collection to welcome view
    }

    // public function dashboard(){
    //     return view('dashboard');
    // }

}
