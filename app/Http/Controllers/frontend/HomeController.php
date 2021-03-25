<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Country;
use App\Models\States;
use App\Models\City;
use App\Models\Types_of_shoot;
use App\Models\Portfolio_image;
use DB;
USE Input;
use Session;



use illuminate\Support\Facades\Auth;



class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function aboutus()
    {
        return view('frontend.aboutus');
    }
    
    public function login()
    {
        return view('frontend.login');
    }

    public function profile(User $user , Portfolio_image $portfolio_image)
    {
        $portfolio_image = Portfolio_image::where('user_id',$user->id)->get();
        // dd($portfolio_image[1]->filename);
        return view('frontend.profile')->with([
            'user' => $user,
            'portfolio_image' => $portfolio_image
            ]);
    }

    public function registration()
    {
        return view('frontend.registration');
    }
    
    public function chooseregister()
    {
        return view('frontend.chooseregister');
    }
    
    public function searchphotographer()
    {
        // $users = User::with(['roles' => where('name', 'photographer')
        // ]);
        // return view('frontend.search-photographer')->with('users', $users);
        
        $users = User::whereHas('roles' , function($query) {
            $query->where('name','photographer');
        })
        ->where('country',Auth::user()->country)
        
        ->get();
        // $countries = Country::get(["name","id"]);

        // dd(Auth::user()->country);   
        if($users->isEmpty())
        {
            Session::flash('message', "No Photographers Found In Your Country");
            
            return view('frontend.search-photographer')->with([
                // 'countries' => $countries,
                'users' => $users
            ]);

        }
        else
        {
            Session::flash('message', "These are the Photographers Available in Your Country");

        return view('frontend.search-photographer')->with([
            // 'countries' => $countries,
            'users' => $users
        ]);
        }
    }

    public function filterphotographer(Request $request )
    {
        // dd('hello');
        // $users = User::with(['roles' => where('name', 'photographer')
        // ]);
        // return view('frontend.search-photographer')->with('users', $users);
        // $id = DB::table('types_of_shoots')
        // ->select('id')
        // ->where('types_of_shoots','=', $request->type_of_shoot)
        // ->first();
        // $id = Types_of_shoot::where('types_of_shoots',$request->type_of_shoot)->pluck('user_id');
        // // dd( $id[0] );

        // foreach($id as $user_ids)
        // {
        //     $data['users'] = User::whereHas('roles' , function($query) {
        //         $query->where('name','photographer');
        //     })
            
        //     ->where('country',$request->country)
        //     ->where('id',$user_ids)

        
            
            
        //     ->get();
        //     // dd( $user_ids);
        // }
        $users = DB::table('types_of_shoots')->where('types_of_shoots.types_of_shoots', $request->type_of_shoot)->leftjoin('users as users', 'types_of_shoots.user_id', '=', 'users.id')->where('users.province', $request->province)->select('users.id','users.name', 'users.father_name', 'users.profilepic','users.company_name','users.description','users.country','users.address','users.experience','users.email')->get();
        
        // dd( $data['users']);
        // $countries = Country::get(["name","id"]);

        // dd($request->country,$users);

        // dd(Auth::user()->country);   
        if($users->isEmpty())
        {
            Session::flash('message', "No Result Found");
            
            return view('frontend.search-photographer')->with([
                // 'countries' => $countries,
                'users' => $users
            ]);

        }
        else
        {
            Session::flash('message', "Search Result");

        return view('frontend.search-photographer')->with([
            // 'countries' => $countries,
            'users' => $users
        ]);
        }
    }


    public function filter2photographer(Request $request )
    {
        // dd('hello');
        // $users = User::with(['roles' => where('name', 'photographer')
        // ]);
        // return view('frontend.search-photographer')->with('users', $users);
        // $id = DB::table('types_of_shoots')
        // ->select('id')
        // ->where('types_of_shoots','=', $request->type_of_shoot)
        // ->first();
        // $id = Types_of_shoot::where('types_of_shoots',$request->type_of_shoot)->pluck('user_id');
        // // dd( $id);
        // $users = array();
        
        // foreach($id as $user_ids)
        // {

        // $data['users'] = User::whereHas('roles' , function($query) {
        //     $query->where('name','photographer');
        //     })
            
        //     ->where('id',$user_ids)

        
            
            
        //     ->get();
        // dump( $data);
            
        //     // var_dump($users);
        //     // dd( $user_ids);
        // }

        $users = DB::table('types_of_shoots')->where('types_of_shoots.types_of_shoots', $request->type_of_shoot)->leftjoin('users as users', 'types_of_shoots.user_id', '=', 'users.id')->select('users.id','users.name', 'users.father_name', 'users.profilepic','users.company_name','users.description','users.country','users.address','users.experience','users.email')->get();

        // dd( $data['users']);
        // $countries = Country::get(["name","id"]);

        // dd($request->country,$users);

        // dd(Auth::user()->country);   
        if($users->isEmpty())
        {
            Session::flash('message', "No Result Found");
            
            return view('frontend.search-photographer')->with([
                // 'countries' => $countries,
                'users' => $users
            ]);

        }
        else
        {
            Session::flash('message', "Search Result");

        return view('frontend.search-photographer')->with([
            // 'countries' => $countries,
            'users' => $users
        ]);
        }

    }

    

    

    
}
