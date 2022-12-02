<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Term;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        $terms = $terms->where('status', Term::VISIBLE);
        return view('terms.index', compact('terms'));
    }

    public function show(Term $term)
    {
        return view('terms.show', compact('term'));
    }
}
