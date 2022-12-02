<?php

namespace App\Http\Controllers\Scorm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Scorm;

class ScormController extends Controller
{
    /**
     * Return scorm viewer
     *
     * @return void
     */
    public function index(Scorm $scorm) {

        // echo route('scorm.index', ['scorm' => $scorm]);
        return view('scorm.index', compact('scorm'));
    }
}
