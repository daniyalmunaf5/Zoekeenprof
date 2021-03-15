<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\Role;
use App\Models\Types_of_shoot;
use DB;
USE Input;
use illuminate\Support\Facades\Auth;
use illuminate\Support\Facades\Task;
use Illuminate\Support\Facades\Hash;
use Session;


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
        // $photographer = new User();
        // $photographer->email = request('email');
        // $photographer->name = request('name');
        // $photographer->father_name = request('father_name');
        // $photographer->password = Hash::make(request('password'));
        // $photographer->phone_number = request('phone_number');
        // $photographer->address = request('address');
        // $photographer->country = request('country');
        // $photographer->city = request('city');
        // $photographer->province = request('province');
        // $photographer->postal_code = request('postal_code');
        // $photographer->type_of_shoot = request('type_of_shoot');
        // $photographer->save();

        // $role = Role::select('id')->where('name', 'photographer')->first();

        // $photographer->roles()->attach($role);

        $valiedation_from_array = [
             
            'email' => 'email',
            'name' => 'required',
            'father_name' => 'required',
            'password' => 'required|confirmed|min:8', 
            'password_confirmation' => 'required|same:password|min:6',
            'phone_number' => 'required',
            'company_name' => 'required',
            'address' => 'required', 
            'country' => 'required',
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required',
            'type_of_shoot' => 'required',
            'description' => 'required',
            'experience' => 'required'
            
            ];

            

            $this->validate($request, $valiedation_from_array);

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
                
            // return $photographer;
            Session::flash('success', "Registered Successfully");

        return redirect()->route('custom-login');
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


    public function SelectTypeOfShootIndex(User $user)
    {
        return view('frontend.photographer.choose-typeofshoots');
    }

    public function SelectTypeOfShootStore(Request $request)
    {
        // dd(request('types_of_shoots'));
        // $request->types_of_shoots = request('types_of_shoots');
        foreach ($request->types_of_shoots as $types_of_shoot) 
                {
                    
                    Types_of_shoot::create([
                    'user_id' => Auth::user()->id,
                    'types_of_shoots' => $types_of_shoot
                    ]);
                }
                return redirect()->route('backend.photographer.index',Auth::user()->id);
                
    }
}
