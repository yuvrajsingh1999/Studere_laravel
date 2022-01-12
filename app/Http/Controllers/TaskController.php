<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $role = Role::orderBy('created_at', 'asc')->get();
        $users = User::orderBy('created_at', 'asc')->get();  //returns values in ascending order
        return Response::json(["data" => $users,"filter" => $role],200);
    }

    // public function filter()
    // {  //returns values in ascending order
    //     return Response::json(["filter" => $role],200);
    // }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showData(Request $request)
    {
        $ch = curl_init();

        $url = "http://localhost:8000/v2/amf/stat/result";

        $dataArray = ['current_page' => $request->currentpage];
        $data = http_build_query($dataArray);
        $getUrl = $url."?".$data;
        
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $getUrl);
        curl_setopt($ch, CURLOPT_TIMEOUT, 80);
        $response = curl_exec($ch);
        $err = curl_error($ch);
        
        $dataResp = json_decode($response,JSON_UNESCAPED_SLASHES);

        curl_close($ch);

        return Response::json(["data" => $dataResp],200);

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

    public function login(Request $request)
    {
        // $data = json_decode($request, true, JSON_UNESCAPED_SLASHES);
        // $data = stripslashes($request);
        // return Response::json([
        //     'message' => $data
        // ], 404);
        // dd($request);
        $user= User::where('email', $request->email)->first();
        // print_r($data);

        if($request->username==config('amfConfig.REACT_USERNAME') && $request->password==config('amfConfig.REACT_PASSWORD')) {
            
            $response = [
                'user' => $request->username
                // 'token' => $token
            ];
            return Response::json($response, 201);
        }
            if (!$user || !Hash::check($request->password, $user->password)) {
                return Response::json([
                    'message' => 'These credentials do not match our records.',
                    'status' => 478
                ] );
            }
        
             $token = $user->createToken('my-app-token')->plainTextToken;
        
            $response = [
                'user' => $user,
                'token' => $token
            ];
        
             return Response::json($response, 201);
    }

    public function register(Request $request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'faculty',
            'status' => 1,
            'password' => Hash::make($request['password']),
        ]);
            // $response = [
            //     'user' => $user,
            //     'token' => $token
            // ];
        
            //  return Response::json($response, 201);
    }

    Public function filter($req, Request $request){
        // $role = Role::where("role",$req)->get();
        // dd($request);
        // $last_id;
        $pageNo = $request->page;
        $perPage = $request->perpage;
        $skip = $pageNo*$perPage;
        // dd($skip);
        // if($last_id!=null){
        //     $skip= $skip+$perPage;
        //     $perPage=$perPage+$perPage;
        // }
        if($req!="NULL"){
        $users = User::where("role",$req)->orderBy("id","asc")->skip($skip)->limit($perPage)->get();
        
        $count = User::where("role",$req)->get();
        }if($req=="NULL"){
            $users = User::orderBy("id","asc")->skip($skip)->limit($perPage)->get();
            $count = User::get();
        }
        $count = count($count);
        $users = json_decode(json_encode($users));
        $last_id = end($users)->id;
        $total = intval(intdiv($count,$perPage));
        
        // dd($users);
        // return $perPage;
        // $users =json_encode($users);
        // dd($json);
        return Response::json(["data" => $users,"total" => $total],200);
    
    }
}
