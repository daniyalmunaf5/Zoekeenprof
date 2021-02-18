<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\Role;
use DB;
USE Input;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Task;
use Illuminate\Support\Facades\Hash;

class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function register()
    {
        $data['countries'] = Country::get(["name","id"]);
        return view('frontend.photographer.register',$data);

     
        // return view('frontend.photographer.register',compact('countries','cities','states'));
    }
    

    public function getState(Request $request)
    {
        $data['states'] = State::where("country_id",$request->country_id)
                    ->get(["name","id"]);
        return response()->json($data);
    }
    public function getCity(Request $request)
    {
        $data['cities'] = City::where("state_id",$request->state_id)
                    ->get(["name","id"]);
        return response()->json($data);
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
        $photographer = new User();
        $photographer->email = request('email');
        $photographer->name = request('name');
        $photographer->father_name = request('father_name');
        $photographer->password = Hash::make(request('password'));
        $photographer->phone_number = request('phone_number');
        $photographer->address = request('address');
        $photographer->country = request('country');
        $photographer->city = request('city');
        $photographer->province = request('province');
        $photographer->postal_code = request('postal_code');
        $photographer->type_of_shoot = request('type_of_shoot');
        $photographer->save();

        $role = Role::select('id')->where('name', 'photographer')->first();

        $photographer->roles()->attach($role);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // get the shark

        // show the view and pass the shark to it
        return View::make('frontend.profile',compact('user',$user));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('frontend.profile')->with([
            'user' => $user]);
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
