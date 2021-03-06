<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\Portfolio_image;
use App\Models\Types_of_shoot;
use DB;
use Illuminate\Support\Facades\File;
use Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

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


    public function index(User $user , Portfolio_image $portfolio_image)
    {
        $types_of_shoots = Types_of_shoot::where('user_id',$user->id)->get();
        $portfolio_image = Portfolio_image::where('user_id',$user->id)->get();
        // dd($portfolio_image[1]->filename);
        return view('backend.photographer.index')->with([
            'user' => $user,
            'portfolio_image' => $portfolio_image,
            'types_of_shoots' => $types_of_shoots
            ]);
        // return view('backend.photographer.index')->with([
        //     'user' => $user]);
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
        $roles = Role::all();

        return view('backend.photographer.edit')->with([
            'user' => $user,
            'roles' => $roles,
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
        $valiedation_from_array = [
             
            'email' => 'required',
            'name' => 'required',
            'father_name' => 'required',
            'phone_number' => 'required',
            'company_name' => 'required',
            'address' => 'required', 
            'city' => 'required',
            'province' => 'required',
            'postal_code' => 'required|max:6|min:5',
            'description' => 'required',
            'experience' => 'required'
            
            ];

            $this->validate($request, $valiedation_from_array);



        $user->email = request('email');
        $user->name = request('name');
        $user->father_name = request('father_name');
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

        if(Auth::user()->hasRole('admin')){
        return redirect()->route('backend.users.index',Auth::user()->id)->with('user', $user);
        }
        return redirect()->route('backend.photographer.index',Auth::user()->id)->with('user', $user);

    }



    public function editdp(User $user)
    {

        return view('backend.photographer.editdp')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatedp(Request $request, User $user)
    {   
        


        $profilepic = app('App\Http\Controllers\frontend\UploadImageController')->storage_upload($request->profilepic,'/app/public/PhotographerRegister/');

        
        $user->profilepic = $profilepic;
        $user->save();

        if(Auth::user()->hasRole('admin')){
        return redirect()->route('backend.users.index',Auth::user()->id)->with('user', $user);
        }
        return redirect()->route('backend.photographer.index',Auth::user()->id)->with('user', $user);

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

    public function uploadForm()
    {
    return view('backend.photographer.upload-images');
    }

    public function uploadSubmit(Request $request)
    {
        $this->validate($request, [

        'photos'=>'required',
        ]);
            // dd($request->hasFile('photos'));
        if($request->hasFile('photos'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx'];
            $files = $request->file('photos');
            foreach($files as $file)
            {
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                // dd($check);
            }
                if($check)
                {
                    foreach ($request->photos as $photo) 
                    {
                        $filename = $photo->store('photos');
                        Portfolio_image::create([
                        'user_id' => Auth::user()->id,
                        'filename' => $filename
                        ]);
                    }
                    Session::flash('success', "Uploaded Successfully");
                    return redirect()->route('backend.photographer.index',Auth::user()->id);
                }
                else
                {
                // echo '<div class="alert alert-warning"><strong>Warning!</strong> Sorry Only Upload png , jpg , doc</div>';
                Session::flash('danger', "Warning! Sorry Only Upload png , jpg , doc");
                return redirect()->route('backend.photographer.index',Auth::user()->id);
                }
            }
        }
    }


