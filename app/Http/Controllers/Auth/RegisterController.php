<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //     $user = User::create([
    //         'name' => $data['name'],
    //         'email' => $data['email'],
    //         'password' => Hash::make($data['password']),
    //     ]);

    //     $role = Role::select('id')->where('name', 'photographer')->first();

    //     $user->roles()->attach($role);

    //     return $user;
    // }


    protected function create(array $data)
    {
        if($data['user']=='customer'){

        $customer = new User();
        $customer->email = request('email');
        $customer->name = request('name');
        $customer->password = Hash::make(request('password'));
        $customer->phone_number = request('phone_number');
        $customer->address = request('address');
        $customer->country = request('country');
        $customer->city = request('city');
        $customer->province = request('province');
        $customer->postal_code = request('postal_code');
        $customer->save();

        $role = Role::select('id')->where('name', 'user')->first();

        $customer->roles()->attach($role);

        return $customer;
        }
        

        elseif($data['user']=='photographer'){

            $photographer = new User();
            $photographer->email = request('email');
            $photographer->name = request('name');
            $photographer->father_name = request('father_name');
            $photographer->password = Hash::make(request('password'));
            $photographer->phone_number = request('phone_number');
            $photographer->company_name = request('company_name');
            $photographer->address = request('address');
            $photographer->country = request('country');
            $photographer->city = request('city');
            $photographer->province = request('province');
            $photographer->postal_code = request('postal_code');
            $photographer->type_of_shoot = request('type_of_shoot');
            $photographer->description = request('description');
            $photographer->experience = request('experience');
            $photographer->save();
    
            $role = Role::select('id')->where('name', 'photographer')->first();
    
            $photographer->roles()->attach($role);
    
            return $photographer;
            }

    }

    
}
