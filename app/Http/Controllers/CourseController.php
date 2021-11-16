<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Modality;
use App\Models\Category;
use App\Models\Tag;
use App\Models\Topic;
use Spatie\Permission\Models\Role;

class CourseController extends Controller
{

    /**
     * Controller to manage the courses home page
     */
    public function index()
    {
        return view('courses.index');
    }

    /**
     * Controller to manage the courses single page
     */
    public function show($locale, Course $course)
    {
        // return $course;
        // Show only published courses to autenticated users
        // $this->authorize('published', $course );

        /**
         * Retur related courses
         */
        $related_courses =
            Course::where('category_id', $course->category_id)
            ->where('id', '!=', $course->id)
            ->where('status', 3)
            ->latest('id')
            ->take(5)
            ->get();

        $roles = Role::all();

        return view('courses.show', compact('course', 'related_courses', 'roles'));
    }

    /**
     * Controller to enrolled users
     */
    public function enrolled($locale, Course $course)
    {

        // insert user auth id in course_user table
        $course->students()->attach(auth()->user()->id);

        // redirect user to enrolled course;
        return redirect()->route('courses.status', [$locale, $course]);
    }


    public function category($locale, Category $category)
    {

        // return $category;
        $topics = Topic::where('category_id', $category->id)->get();

        return view('courses.category', compact('locale', 'category', 'topics'));
    }

    public function topic($locale, Category $category, Topic $topic)
    {

        // return topic;
        $tags = Tag::where('topic_id', $topic->id)->get();

        return view('courses.topic', compact('locale', 'category', 'topic', 'tags'));
    }

    public function tag($locale, Tag $tag)
    {

        $courses = $tag->courses()
            ->where('status', 2)
            ->latest('id')
            ->paginate(8);

        return view('courses.tag', compact('locale', 'courses', 'tag'));
    }


    public function modality($locale, Modality $modality)
    {

         // return $modality;
        $courses = Course::where('modality_id', $modality->id)->get();

        return view('courses.modality', compact('locale', 'modality', 'courses'));
    }

    /**
     * (OPTIONAL)
     * Controller to enrolled users and redirect to external URL
     */
    // public function enrolled( Course $course ){

    //     // insert user auth id in course_user table
    //     $course->students()->attach( auth()->user()->id );

    //     if( $course->url != '' ){

    //         // return Redirect to external URL
    //         return redirect()->away($course->url);

    //     } else {
    //         // redirect user to enrolled course;
    //         return redirect()->route('courses.status', $course);
    //     }

    // }

}
