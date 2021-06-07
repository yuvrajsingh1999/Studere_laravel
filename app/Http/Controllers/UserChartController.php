<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Charts\UserChart;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get()->unique('created_at');
        // dd($users);
        $base=array();
        $side=array();
        foreach($users as $use){
            $temp = explode(' ',$use->created_at);
            
                // $base[] = $temp[0];

            //  if($temp[0] != $base[$i]){
                $base[] = $temp[0];
                //}
            
            
            $num = User::where('created_at','LIKE',$temp[0].'%')->get();
            $side[] = count($num);
        }

            // dd($base);
        $usersChart = new UserChart;
        $usersChart->labels($base);
        $usersChart->dataset('Total user register', 'bar', $side);
        // $usersChart-> options: { scales: { xAxis:{  
        //                   valueFormatString: "MMM"
        //           },},},
        //  dd($usersChart);
        return view('admin.admin-home', [ 'usersChart' => $usersChart ] );
   
    }

}
