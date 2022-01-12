<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
<<<<<<< Updated upstream
=======
use Session;
use Illuminate\Support\Facades\Auth;
use App\Events\LoginHistory;

>>>>>>> Stashed changes

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function redirectTo()
    {
<<<<<<< Updated upstream
=======

        if(auth()->user()->status == 1){ 
>>>>>>> Stashed changes
        if (auth()->user()->role == 'admin') {
            return '/admin';
        }
        if (auth()->user()->role == 'student') {
            
            return '/student';
        }
        if (auth()->user()->role == 'faculty') {

            
            return '/faculty';
        }
        
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function authenticated() {

        $user = Auth::user();

        event(new LoginHistory($user));
    }
}
