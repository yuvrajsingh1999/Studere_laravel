<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notice;

class NoticeController extends Controller
{
    public function noticeUpload(Request $request) {
        $request->validate([
            'file' => 'required'
            ]);
            $fileModel = new Notice;
    
            if($request->file()) {
                $fileName = time().'_'.$request->file->getClientOriginalName();
                // $location = 'uploads/'.$department[0].'/sem'.$sem.'/'.$coursecode;
                $filePath = $request->file('file')->storeAs('public/notice', $fileName);
    
                $fileModel->notice = time().'_'.$request->file->getClientOriginalName();
                
                $fileModel->save();
                
                return back()
                ->with('success','File has been uploaded.');
            }

    }

    public function stuNotice() {
        $data = Notice::get();
        return view('faculty.notice-show')->with('data',$data);
    }
    public function facNotice() {
        $data = Notice::get();
        return view('student.notice-show')->with('data',$data);
    }

    public function noticeView($id){
        $data = Notice::find($id);
        return view('student.viewNotice',compact('data'));
       }

       public function noticeDownload(Request $request)
       {
               $filename =$request->name;
               $path = Notice::where('notice',$filename)->first();
               // dd($path);
               return response()->download(public_path("storage/notice/".$filename));
   
   }
   
}
