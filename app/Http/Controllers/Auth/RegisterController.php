<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Role;
use App\Models\Types_of_shoot;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use illuminate\Support\Facades\Auth;
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
    // protected $redirectTo = RouteServiceProvider::HOME;
        
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
        
        $profilepic = app('App\Http\Controllers\frontend\UploadImageController')->storage_upload(request('profilepic'),'/app/public/CustomerRegister/');
    
        $customer = new User();
        $customer->email = request('email');
        $customer->name = request('name');
        $customer->password = Hash::make(request('password'));
        $customer->phone_number = request('phone_number');
        $customer->address = request('address');
        $customer->country = request('country');
        $customer->city = request('city');
        $customer->province = request('province');
        $customer->profilepic = $profilepic;
        $customer->postal_code = request('postal_code');
        $customer->save();

        $role = Role::select('id')->where('name', 'user')->first();

        $customer->roles()->attach($role);

        return $customer;
        }
        

        elseif($data['user']=='photographer'){

            $profilepic = app('App\Http\Controllers\frontend\UploadImageController')->storage_upload(request('profilepic'),'/app/public/PhotographerRegister/');
            // dd($profilepic);
            $photographer = new User();
            $photographer->email = request('email');
            $photographer->name = request('name');
            $photographer->father_name = request('father_name');
            $photographer->password = Hash::make(request('password'));
            $photographer->phone_number = request('phone_number');
            $photographer->company_name = request('company_name');
            $photographer->address = request('address');
            $photographer->country = request('country');
            $photographer->profilepic = $profilepic;
            $photographer->city = request('city');
            $photographer->province = request('province');
            $photographer->postal_code = request('postal_code');
            $photographer->type_of_shoot = request('type_of_shoot');
            // dd(request('types_of_shoots'));
            // $request->types_of_shoots = request('types_of_shoots');
            // foreach ($data['types_of_shoots'] as $types_of_shoot) 
            //         {
                        
            //             Types_of_shoot::create([
            //             'user_id' => request('id'),
            //             'types_of_shoots' => $types_of_shoot
            //             ]);
            //         }
            $photographer->description = request('description');
            $photographer->experience = request('experience');
            $photographer->save();
    
            $role = Role::select('id')->where('name', 'photographer')->first();
    
            $photographer->roles()->attach($role);
    
            return $photographer;
            }

    }

    public function redirectTo()
        {
            if(Auth::user()->hasRole('admin')){
                $this->redirectTo = route('backend.users.index');
                return $this->redirectTo;
            }

            elseif(Auth::user()->hasRole('photographer')){
                $this->redirectTo = route('Select-typeofshoot');
                return $this->redirectTo;
            }

            $this->redirectTo = route('frontend.home');
            return $this->redirectTo;

        }

    
}
