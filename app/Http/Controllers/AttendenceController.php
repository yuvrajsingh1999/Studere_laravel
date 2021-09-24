<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendence;
use App\Models\StudentProfile;
use Session;

class AttendenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $studentid = auth()->user()->id;
        $students = StudentProfile::select('department','sem')->where('user_id',$studentid)->first();
        // dd($students);
        return view('student.show-atten')->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'session' => 'required',
            'date' => 'required',
            'lec' => 'required'
            
            
            ]);
            $semester = $request->input('sem');
            $dept = $request->input('dept');
            $users = StudentProfile::where('sem',$semester)->where('department',$dept)->get();
            // dd($users);
            foreach($users as $use){
                
            $atten = new Attendence;
            $atten->lecture_code =$request->input('lec');
            $atten->date =$request->input('date');
            $atten->roll_no = $request->input('stu'.$use->roll_no);
            $atten->attendence = $request->input('atten'.$use->roll_no);
            $atten->session =$request->input('session');
                $atten->save();
            }

           Session::flash('message','Students Attendence Marked successfully.');
            return redirect('/attendence');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $studentid = auth()->user()->id;

        $dept=$request->input('dept');
        $sem=$request->input('sem');
        $session=$request->input('session');
        $rollno = StudentProfile::where('user_id',$studentid)->pluck('roll_no');

        $attendence = Attendence::where('session',$session)->where('roll_no',$rollno[0])->get();
        // dd($attendence);
        $prsnt = Attendence::where('session',$session)->where('roll_no',$rollno[0])->where('attendence','present')->get();
        $absnt = Attendence::where('session',$session)->where('roll_no',$rollno[0])->where('attendence','absent')->get();
        $students = StudentProfile::select('department','sem')->where('user_id',$studentid)->first();
        $cnt_prsnt = count($prsnt);
        $totalday = count($attendence);
        $cnt_absnt = count($absnt);


        return view('student.show-atten', compact('attendence','students','cnt_prsnt','totalday','cnt_absnt','session'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
