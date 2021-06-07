<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacultyProfile;
use App\Models\FacultyAttendence;
use Session;

class FacultyAttenController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request,[
            'session' => 'required',
            'date' => 'required',
            
            
            
            ]);
            $semester = $request->input('sem');
            $dept = $request->input('dept');
            $facid = $request->input('facid');
            $users = FacultyProfile::where('sem',$semester)->where('user_id',$facid)->where('department',$dept)->first();
            //  dd($users);
            //foreach($users as $use){
                
            $atten = new FacultyAttendence;
            $atten->date =$request->input('date');
            $atten->faculty_id = $facid;
            $atten->attendence = $request->input('atten'.$facid);
            $atten->session =$request->input('session');
            $atten->save();
            //}

           Session::flash('message','Your Attendence Marked successfully.');
            return redirect('/attendence');
    }

}
