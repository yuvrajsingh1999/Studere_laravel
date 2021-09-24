<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentProfile;
use App\Models\Department;
use App\Models\Setting;
use App\Models\TimeTable;
use Illuminate\Support\Facades\DB;
use Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('student.student-home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $userid = auth()->user()->id;
        $users = StudentProfile::where('user_id',$userid)->get();
        return view('student.student-profile')->with('users',$users);
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
            'class' => 'required',
            'department' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'dob' => 'required',
            'address' => 'required',

            'rollno' => 'required',
            'profile_pic' => 'image|nullable|max:1999'
            
            ]);
            //Handle file upload
            if($request->hasFile('profile_pic')){
                $file = $request->file('profile_pic');
                $filenameWithExt = $request->file('profile_pic')->getClientOriginalName();
                //get just filename
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                $extension = $request->file('profile_pic')->getClientOriginalExtension();

                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                $location= 'profile_image';
                $file->move($location,$fileNameToStore);
                //$path = $request->file('profile_pic')->storeAs('profile_image', $fileNameToStore);
            }
            else {
                $fileNameToStore = 'noimage.jpg';
            }
            //create posts
            $userid=auth()->user()->id;
            $profile = new StudentProfile;
            $profile->gender = $request->input('gender');
            $profile->class = $request->input('class');
            $profile->sem = $request->input('sem');
            $profile->department = $request->input('department');
            
            $profile->phone = $request->input('phone');

            $profile->address = $request->input('address');

            $profile->user_id = $userid;
            $profile->dob = $request->input('dob');
            $profile->roll_no = $request->input('rollno');
            $profile->profile_pic = $fileNameToStore;
            $profile->save();


           Session::flash('message','Update successfully.');
            $users = StudentProfile::where('user_id',$userid)->get();
            return view('student.student-profile')->with('users',$users);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
        return view('student.enter-profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function stuTimeTable()
    {
        $userid = auth()->user()->id;
        $data = StudentProfile::select('department','sem','class')->where('user_id',$userid)->first();
        // dd($data);
        $deptid = Department::where('name',$data['department'])->pluck('id');
        $timetables = TimeTable::where('dept',$deptid)->where('class',$data['class'])->where('semester',$data['sem'])->first();
        // dd($timetables);
        $daysLabel = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

        $institution = (new Setting())->getByKey('institution_name');
        return view('student.stuShow',compact('timetables','institution','daysLabel'));
        // $timetable = TimeTable::where('dept',$deptid)->where('semester',$data['sem'])->first();

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
