<?php

namespace App\Http\Controllers\Auth;
use Spatie\Permission\Models\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Admin\StoreUsersRequest;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    public function register()
    {
        $roles = Role::get()->pluck('name', 'name');

        return view('register', compact('roles'));
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(StoreUsersRequest $request)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],

            'password' => Hash::make($data['password']),
        ]);

        $roles = Role::get()->pluck('name', 'name');
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->assignRole($roles);
       $user->roles()->save($roles);
     return $user ;
     return $roles;
    }

}
