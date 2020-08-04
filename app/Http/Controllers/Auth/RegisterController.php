<?php

namespace App\Http\Controllers\Auth;

use App\EmployerProfile;
use App\EmployeeProfile;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Socialite;

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


    protected $redirectTo = '/login';

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
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'role' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'mobile' => ['required', 'digits:10', 'numeric'],
            //'password' => ['required', 'string', 'min:6', 'confirmed'],
            'day' => ['required'],
            'month' => ['required'],
            'year' => ['required'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'email' => $data['email'],
            'password' => bcrypt("jobcito".$data['year']),
        ]);
        EmployeeProfile::create([
                'user_id' => $user->id,
                'city_id' => 354,
                'dob' => $data['year']."-".$data['month']."-".$data['day'],
                'name' => $data['name'],
                'contact' => $data['mobile'],
        ]);
        $user->assignRole('employee');
        // if ($data['role'] == 'employer') {
        //     EmployerProfile::create([
        //         'user_id' => $user->id,
        //         'city_id' => 354
        //     ]);
        //     $user->assignRole('employer');
        // } else {
        //     EmployeeProfile::create([
        //         'user_id' => $user->id,
        //         'city_id' => 354,
        //         'dob' => $data['year']."-".$data['month']."-".$data['day'],
        //         'name' => $data['name'],
        //         'contact' => $data['mobile'],
        //     ]);
        //     $user->assignRole('employee');
        // }

        return $user;
    }
}
