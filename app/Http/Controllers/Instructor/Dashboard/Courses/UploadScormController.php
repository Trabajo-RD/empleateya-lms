<?php

namespace App\Http\Controllers\Instructor\Dashboard\Courses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadScormController extends Controller
{
    public function index() {
        // ...
    }

    public function store(Request $request) {
        $request->validate([
            'origin_file' => 'required'
        ]);
    }
}
