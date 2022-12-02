<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LearningPathController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:create-course')->only('index', 'create', 'store', 'new');
        $this->middleware('can:update-course')->only('edit', 'update');
        $this->middleware('can:delete-course')->only('destroy');
    }

    public function index()
    {
        return view('instructor.learning-paths.index');
    }
}
