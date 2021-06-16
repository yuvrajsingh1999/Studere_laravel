<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FacultyBuffer;
use App\Models\User;
use App\Models\Notice;
use Illuminate\Support\Facades\DB;
use Session;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.admin-home');
    }



    public function teamShow(){
        return view("team");
    }

    public function mailAdmin(){
        return view("admin.mail");
    }
    public function notice(){
        $data = Notice::get();
        return view("admin.notice-form")->with('data',$data);
    }

    // activate and deactivate
    public function deactivate($id){
        User::where('id',$id)->update(['status' => 0]);
        return redirect()->back();
    }
    public function activate($id){
    
        User::where('id',$id)->update(['status' => 1]);
        return redirect()->back();
    }


    public function facultyList(){
        $faculty = User::where('role','faculty')->get();
        // dd($faculty);

        return view("admin.list-fac")->with('faculty',$faculty);
    }
    public function studentList(){
        $student = User::where('role','student')->get();
        
        return view("admin.list-stu")->with('students',$student);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $userid = $id;
        $users = FacultyBuffer::where('id',$userid)->get();
        
        foreach($users as $use){

        User::create([
            'name' => $use->name,
            'email' => $use->email,
            'role' => $use->role,
            'status' => 1,
            'password' => $use->password,
        ]);
        }
        DB::delete('delete from faculty_buffers where id = ?',[$userid]);


        $faculties = FacultyBuffer::orderBy('id','asc')->get();
        
        return redirect('/requestaccount')->with('faculties',$faculties);
        

       

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $faculties = FacultyBuffer::orderBy('id','asc')->get();
        // foreach($faculties as $fac){
        //     print_r($fac->name);
        // }
        // dd($faculties);
        return view('admin.faculty-buffer')->with('faculties',$faculties);
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
