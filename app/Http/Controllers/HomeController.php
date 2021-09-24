<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function support(){
        if(auth()->user()->role == 'admin'){

        return view('admin.support');
        }
        if(auth()->user()->role == 'faculty'){
            
        return view('faculty.support');
        }
        if(auth()->user()->role == 'student'){
         
        return view('student.support');   
        }
    }


    public function composeEmail(){
        return view("emails.email");
    }



    public function sendEmail(Request $request) {
        $toEmail    =   $request->emailAddress;
        $data       =   array(
            "message"    =>   $request->message
        );

        // pass dynamic message to mail class
        Mail::to($toEmail)->send(new MyTestMail($data));

        if(Mail::failures() != 0) {
            return back()->with("success", "E-mail sent successfully!");
        }

        else {
            return back()->with("failed", "E-mail not sent!");
        }
    }
}
