<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;

use App\User;
use App\Models\UserDetail;
use App\Models\Specialty;

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
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        $specialties = Specialty::orderBy('label','ASC')->get();
        return view('auth.register', compact('specialties'));
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
            'name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:255'],
            'first_name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:50'],
            'last_name' => ['required', 'regex:/^[\pL\s\-]+$/u', 'max:50'],
            'address' => ['required', 'max:100'],
            'city' => ['required', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'specialties' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'specialties.required' => 'Non puoi registrarti senza almeno una specializzazione'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'address' => $data['address'],
            'email' => $data['email'],
            'city' => $data['city'],
            'password' => Hash::make($data['password']),
        ]);

        $details = new UserDetail();

        $details->user_id = $user->id;

        $user->specialties()->sync($data['specialties']);

        $basic = ['1'];

        $user->sponsorships()->attach($basic);

        $details->save();
        return $user;
    }
}
