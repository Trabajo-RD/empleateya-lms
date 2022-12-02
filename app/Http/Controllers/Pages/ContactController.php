<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Mail;
use App\Models\Contact;

class ContactController extends Controller
{   

    public function contact(){
        return view('pages.contact-us');
    }

    public function sendEmail(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required'
        ]);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'msg' => $request->message
        ];

        Mail::to('ramon.fabian@mt.gob.do')->send(new ContactMail($details));     
        
        Contact::create($request->all());

        return back()->with('message_sent', 'Su mensaje se ha enviado satisfactoriamente!');
    }
}
