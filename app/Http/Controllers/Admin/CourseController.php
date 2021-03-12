<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    public function index(){

        // TODO: Connect to Microsoft Learning API
        // $microsoft_learn_courses = Http::get('https://docs.microsoft.com/api/contentbrowser/search?environment=prod&locale=es-es&facet=roles&facet=levels&facet=products&facet=resource_type&%24filter=((resource_type%20eq%20%27learning%20path%27))&%24orderBy=popularity%20desc%2Clast_modified%20desc%2Ctitle&%24top=30&showHidden=false');
        // $microsoft_courses = $microsoft_learn_courses->json();

        $courses = Course::where('status', 2)->paginate();

        return view('admin.courses.index', compact('courses'));

        // TODO: uncomment to return Microsoft Learning API data
        //return view('admin.courses.index', compact('courses', 'microsoft_courses'));
    }
}
