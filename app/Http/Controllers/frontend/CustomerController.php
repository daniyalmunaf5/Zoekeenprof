<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use DB;
USE Input;
use Illuminate\Support\Facades\Hash;
use Session;




class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('frontend.customer.register',$data);
        // return view('frontend.customer.register');
    }


    public function index()
    {
        //
    }

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
        // $customer = new User();
        // $customer->email = request('email');
        // $customer->name = request('name');
        // $customer->password = Hash::make(request('password'));
        // $customer->phone_number = request('phone_number');
        // $customer->address = request('address');
        // $customer->country = request('country');
        // $customer->city = request('city');
        // $customer->province = request('province');
        // $customer->postal_code = request('postal_code');
        // $customer->save();

        // $role = Role::select('id')->where('name', 'user')->first();

        // $customer->roles()->attach($role);

        $valiedation_from_array = [
             
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|confirmed|min:8', 
            'password_confirmation' => 'required|same:password|min:8',
            'phone_number' => 'required',
            'address' => 'required', 
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            
            ];

            $this->validate($request, $valiedation_from_array);

        $profilepic = app('App\Http\Controllers\frontend\UploadImageController')->storage_upload(request('profilepic'),'/app/public/CustomerRegister/');
    
        $customer = new User();
        $customer->email = request('email');
        $customer->name = request('name');
        $customer->password = Hash::make(request('password'));
        $customer->phone_number = request('phone_number');
        $customer->address = request('address');
        $customer->country = 'Netherlands';
        $customer->city = request('city');
        $customer->province = request('province');
        $customer->profilepic = $profilepic;
        $customer->postal_code = request('postal_code');
        $customer->save();

        $role = Role::select('id')->where('name', 'user')->first();

        $customer->roles()->attach($role);

        Session::flash('success', "Registered Successfully");

        return redirect()->route('custom-login');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
