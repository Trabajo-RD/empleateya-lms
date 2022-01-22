<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocsController extends Controller
{
    public function overview(){
        return view('pages.docs.overview');
    }

    public function roles(){
        return view('pages.docs.roles');
    }

    public function permissions(){
        return view('pages.docs.permissions');
    }

    /**
     * News
     */
    public function instructorNews(){
        return view('pages.docs.news.instructor');
    }

    public function studentNews(){
        return view('pages.docs.news.student');
    }

    // public function phpInfo(){
    //     return view('pages.docs.phpinfo');
    // }
}
