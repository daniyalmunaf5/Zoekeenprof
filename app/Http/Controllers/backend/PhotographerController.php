<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class PhotographerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(User $user)
    {
        // get the shark

        // show the view and pass the shark to it
        return view('backend.photographer.index')->with([
            'user' => $user]);
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
        //
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
    public function edit(User $user)
    {
        $countries = Country::get(["name","id"]);

        return view('backend.photographer.edit')->with([
            'user' => $user,
            'countries' => $countries
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->email = request('email');
        $user->name = request('name');
        $user->father_name = request('father_name');
        $user->password = Hash::make(request('password'));
        $user->phone_number = request('phone_number');
        $user->company_name = request('company_name');
        $user->address = request('address');
        $user->country = request('country');
        $user->city = request('city');
        $user->province = request('province');
        $user->postal_code = request('postal_code');
        $user->type_of_shoot = request('type_of_shoot');
        $user->description = request('description');
        $user->experience = request('experience');

        $user->save();

        return redirect()->route('backend.photographer.index',Auth::user()->id);
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
