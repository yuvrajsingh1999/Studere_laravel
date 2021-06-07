<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use App\Models\Department;
use App\Models\FacultyProfile;
use App\Models\StudentProfile;

class CourseController extends Controller
{
    
    public function index(Department $department, Courses $course, Request $request)
    {
        $dept = $request->dept ?? 0;
        $level = $request->level ?? 0;
        $sem = $request->sem ?? 0;
        $sess = $request->sess ?? 0;

        $courses = $course->where([
            'dept' => $dept,
            'level' => $level,
            'semester' => $sem,
            'session' => $sess
        ])->get();

        $generalCourses = $course->where([
            'level' => $level,
            'semester' => $sem,
            'session' => $sess
            ])->get();

        $courses = collect($courses)->merge($generalCourses)->unique()->values()->all();

        $departments = $department->all();
        return view('courses', compact('departments', 'courses'));
    }

    public function store(Request $request, Courses $course)
    {
        try{
            $data = $request->all();
            $data['dept'] = $data['dept'] ?? 0;
            $course->create($data);
            return redirect()->back()->with('success', 'Course created successfully');
        } catch (\Exception $e)
        {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function uploadmat()
    {
        $userid = auth()->user()->id;
        $profile = FacultyProfile::select('department','sem')->where('user_id',$userid)->first();
        $dept = Department::where('name',$profile['department'])->pluck('id');
        $courses = Courses::where('dept',$dept[0])->where('semester',$profile['sem'])->get();
        // dd($courses);

        return view('material.show-course')->with('courses',$courses)->with('profiles',$profile);



    }


    public function showmat()
    {
        $userid = auth()->user()->id;
        $profile = StudentProfile::select('department','sem','class')->where('user_id',$userid)->first();
        $dept = Department::where('name',$profile['department'])->pluck('id');
        $courses = Courses::where('dept',$dept[0])->where('semester',$profile['sem'])->get();
        // dd($courses);

        return view('material.student-show')->with('courses',$courses)->with('profiles',$profile);



    }
    
}
