<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Mail;
use Session;


class ContactController extends Controller
{
    public function showForm(Request $request) {
        if(auth()->user()->role == 'student'){

        return view('student.contact');
        }

        if(auth()->user()->role == 'faculty'){
         
        return view('faculty.contact');   
        }
      }
    
      public function storeForm(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'subject'=>'required',
            'message' => 'required'
         ]);
  
        ContactUs::create($request->all());
            
        \Mail::send('emails.email', array(
              'name' => $request->get('name'),
              'email' => $request->get('email'),
              'phone' => $request->get('phone'),
              'subject' => $request->get('subject'),
              'bodyMessage' => $request->get('message'),
          ), function($message) use ($request){
              
              $message->from($request->get('email'));
              $message->to('studere1info@gmail.com', 'Hello Admin')->subject($request->get('subject'));
            //   dd($message);
          });      
  
        return back()->with('success', 'Thanks for contacting!');
    }


    public function sendMail(Request $request){

      $title = $request->input('title');
    $to = $request->input('to');
    $body = $request->input('body');
   
    $details = [
        'title' => $title,
        'body' => $body
    ];
   
    \Mail::to($to)->send(new \App\Mail\MyTestMail($details));
    return redirect()->back()->with('success', 'Thanks for contacting!');
    
    }
}
