<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Material;
use App\Models\Department;
use App\Models\FacultyProfile;
use App\Models\Courses;

class MaterialsController extends Controller
{
    public function createForm(){
        $course = request('code');
        $sem = request('sem');
        $deptcode = request('deptcode');
        // dd($deptcode);
        return view('material.file-upload', compact('course','sem','deptcode'));
      }
    
      public function fileUpload(Request $req){
            $req->validate([
            'file' => 'required'
            ]);
                
            $coursecode = $req->input('course');
            $sem = $req->input('sem');
            $deptcode = $req->input('deptcode');
                $userid = auth()->user()->id;
                $class = FacultyProfile::where('user_id',$userid)->pluck('class');

                $session = Courses::where('code',$coursecode)->pluck('session');
                $department = Department::where('id',$deptcode)->pluck('name');
                // dd($class);
            $fileModel = new Material;
    
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                // $location = 'uploads/'.$department[0].'/sem'.$sem.'/'.$coursecode;
                $filePath = $req->file('file')->storeAs('public/assets', $fileName);
    
                $fileModel->file_name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = 'assets';
                $fileModel->department =$department[0];
                $fileModel->semester =$sem;
                $fileModel->class =$class[0];
                $fileModel->session = $session[0];
                
                $fileModel->save();
    
                return back()
                ->with('success','File has been uploaded.')
                ;
            }
       }


       public function showStudent(){
        $courseid = request('code');
        $sem = request('sem');
        $deptcode = request('deptcode');
        $session = request('sess');

        $class = request('class');
        $department = Department::where('id',$deptcode)->pluck('name');
        // dd($deptcode);

        $materials = Material::where('class',$class)->where('department',$department[0])->where('semester',$sem)->get();

        // dd($materials);

        return view('material.file-show', compact('materials','department'));
      }

      public function fileDownload(Request $request)
    {
            $filename =$request->name;
            $path = Material::where('file_name',$filename)->pluck('file_path');
            // dd($path);
            return response()->download(public_path("storage/".$path[0]."/".$filename));

}

public function fileView($id){
 $data = Material::find($id);
 return view('viewproduct',compact('data'));
}
    
}
