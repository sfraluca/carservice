<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Session;

class WebController extends Controller
{
    
   
    public function web()
    {
        return view('welcome');
    }
    
    public function storeContact(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
        ]);

        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );
           

        Mail::send('email', $data, function($message) use ($data){
            $message->from($data['email']);
            $message->to('mailtr@mailtrap.io');
            $message->subject($data['subject']);
        });
        Session::flash('success', 'Your email was sent!');

        return redirect()->route('website');
    }
}
