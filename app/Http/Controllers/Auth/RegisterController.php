<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use http\Client\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
            'password' => ['required', 'string', 'min:2'],
            'surname' => ['required','string', 'max:255'],
            'phone' => ['string'],

            'avatar' => ['image'],
            'birthdate' => ['date'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'city' => ['string'],
            'role' => ['string'],
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
        $avatar_path = request()->file('avatar')->store('assets/img/avatar', 'public');

        return User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'surname' => $data['surname'],

            'avatar' => $avatar_path,
            'birthdate' => $data['birthdate'],

            'email' => $data['email'],

            'role_id' => $data['role'],
            'city' => $data['city'],
            'phone' => $data['phone'],
        ]);
    }
}
