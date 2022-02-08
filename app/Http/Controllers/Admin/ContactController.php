<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index($locale)
    {
        return view('admin.contacts.index');
    }

    public function deleted_messages()
    {
        return view('admin.contacts.deleted');
    }
}
