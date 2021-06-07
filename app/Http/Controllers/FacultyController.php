<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacultyProfile;
use App\Models\StudentProfile;
use App\Models\FacultyAttendence;
use App\Models\Department;
use App\Models\Courses;
use Illuminate\Support\Facades\DB;
use Session;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $userid = auth()->user()->id;
        // $profiles = FacultyProfile::where('user_id',$userid)->pluck('profile_pic');
        // // dd($profiles);
        return view('faculty.faculty-home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userid = auth()->user()->id;
        $users = FacultyProfile::where('user_id',$userid)->get();
        return view('faculty.faculty-profile')->with('users',$users);

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
            $profile = new FacultyProfile;
            $profile->gender = $request->input('gender');
            $profile->class = $request->input('class');
            $profile->sem = $request->input('sem');
            $profile->department = $request->input('department');
            
            $profile->phone = $request->input('phone');

            $profile->address = $request->input('address');

            $profile->user_id = $userid;
            $profile->dob = $request->input('dob');
            $profile->profile_pic = $fileNameToStore;
            $profile->save();


           Session::flash('message','Update successfully.');
            $users = FacultyProfile::where('user_id',$userid)->get();
            return view('faculty.faculty-profile')->with('users',$users);

            //return redirect('/usereditprofile')->with('success','Profile updated');
   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('faculty.enter-profile');
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

    public function attendence()
    {
        $userid = auth()->user()->id;
        $attendences = FacultyAttendence::where('faculty_id',$userid)->get();
        return view('faculty.attendence')->with('attendences',$attendences);
    }

    public function markStuAttendence()
    {   
        $userid = auth()->user()->id;
        $class = FacultyProfile::select('class','department','sem')->where('user_id',$userid)->first();
        // print_r($class[0]);
          //dd($class);
          $department = Department::where('name',$class->department)->pluck('id');
        //   print_r($department[0]);
          $courses = Courses::where('dept',$department[0])->where('semester',$class->sem)->get();
        //   dd($courses);
          $students= StudentProfile::where('class',$class->class)->get();
         
        return view('faculty.mark-stu-atten')->with('students',$students)->with('courses',$courses);
    }


    public function markFacAttendence()
    {   
        $userid = auth()->user()->id;
        $class = FacultyProfile::select('department','sem')->where('user_id',$userid)->first();
        // print_r($class[0]);
        //   dd($class);
        //   $department = Department::where('name',$class->department)->pluck('id');
        //   print_r($department[0]);
        //   $courses = Courses::where('dept',$department[0])->where('semester',$class->sem)->get();
        //   dd($courses);
        //   $students= StudentProfile::where('class',$class->class)->get();
         
        return view('faculty.mark-fac-atten')->with('classes',$class);
    }
}
