<?php

namespace App\Http\Controllers\Contributor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        //return $request;
        return view('contributor.index');
    }
}
