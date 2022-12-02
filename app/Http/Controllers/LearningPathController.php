<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LearningPath;

class LearningPathController extends Controller
{
    public function index()
    {
        $published_learning_paths = LearningPath::published();

        // return $published_learning_paths;

        return view('learning-paths.index', compact('published_learning_paths'));
    }

    public function show(LearningPath $path)
    {
        // Increment view count
        LearningPath::find($path->id)->increment('views');

        $relatedLearningPaths = LearningPath::where('topic_id', $path->topic_id)
                                ->where('id', '!=', $path->id)
                                ->where('status', 3)
                                ->latest('id')
                                ->take(5)
                                ->get();

        return view('learning-paths.show', compact('path', 'relatedLearningPaths'));
    }

    public function learningPathStatus(LearningPath $path)
    {
        return view('learning-paths.status', compact('path'));
    }

    public function enrollment(LearningPath $path)
    {
        return view('learning-paths.enrollment', compact('path'));
    }

    public function enrolled(LearningPath $path)
    {
        $user = auth()->user();

        $path->users()->attach($user->id);

        if(!$user->hasRole('student'))
        {
            $user->assignRole('student');
        }

        return redirect()->route('learning-paths.status', $path)->with('success', 'Tu inscripción se ha realizado satisfactoriamente! Aquí podrás llevar el avance de esta ruta, y podrás ver esta y otras más en la sección Mi Aprendizaje');
    }
}
