<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;

class WorkshopController extends Controller
{
    /**
     * Return the workshops index page
     */
    public function index()
    {
        $published_workshops = Workshop::published();

        // return $published_workshops;

        return view('workshops.index', compact('published_workshops'));
    }

    /**
     * Show the single workshop page
     *
     * @param   \App\Models\Workshop    $workshop
     */
    public function show(Workshop $workshop)
    {
        // show only published workshops
        $this->authorize('published', $workshop);

        // Increment view count
        Workshop::find($workshop->id)->increment('views');

        $available_workshops = Workshop::where('status', 3)
            ->where('id', '!=', $workshop->id)
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $now = date('Y-m-d');
        $workshops_timeline = Workshop::where('start_date', '>=', $now)->get();

        $relatedWorkshops = Workshop::where('topic_id', $workshop->topic_id)
                                    ->where('id', '!=', $workshop->id)
                                    ->where('status', 3)
                                    ->latest('id')
                                    ->take(5)
                                    ->get();

        return view('workshops.show', compact('workshop', 'available_workshops', 'workshops_timeline', 'relatedWorkshops'));
    }

    public function workshopStatus(Workshop $workshop)
    {
        return view('workshops.status', compact('workshop'));
    }

    /**
     * Return the view to manage the enrollment
     */
    public function enrollment(Workshop $workshop)
    {
        return view('workshops.enrollment', compact('workshop'));
    }

    public function enrolled(Workshop $workshop)
    {
        // get auth user data
        $user = auth()->user();

        // insert user auth id in course_user table
        $workshop->users()->attach(auth()->user()->id);

        // asign student role to
        if(!$user->hasRole('student'))
        {
            $user->assignRole('student');
        }

        // redirect user to enrolled course;
        return redirect()->route('workshops.status', $workshop)->with('success', 'Tu inscripción se ha realizado satisfactoriamente! Aquí podrás llevar el avance de este taller, y podrás ver este y otros más en la sección Mi Aprendizaje');
    }
}
