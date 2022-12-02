<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Modality;

class ModalityController extends Controller
{
    public function index()
    {
        return "En construcción";
    }

    public function show(Modality $modality)
    {

        //return $modality;

        //$courses = Course::where('modality_id', $modality->id)->get();

        return view('courses.modality', compact('modality'));
    }
}
