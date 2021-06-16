<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\FacultyBuffer;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use GetStream\StreamChat\Client as StreamClient;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'max:255'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        $client = new StreamClient(
            getenv("STREAM_API_KEY"),
            getenv("STREAM_API_SECRET"),
            null,
            null,
            9 // timeout
        );

        $user = [
            'id' => preg_replace('/[@\.]/', '_', $data['email']),
            'name' => $data['name'],
            'role' => $data['role']
        ];

        $client->updateUser($user);

        if($data['role'] == 'student'){

            
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => $data['role'],
            'status' => 1,
            'password' => Hash::make($data['password']),
        ]);
        }
        if($data['role'] == 'faculty'){
            return FacultyBuffer::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'role' => $data['role'],
                'status' => 0,
                'password' => Hash::make($data['password']),
            ]); 
        }
    }
}
