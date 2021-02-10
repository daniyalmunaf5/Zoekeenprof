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
        
        $data['users'] = User::whereHas('roles' , function($query) {
            $query->where('name','photographer');
        })
        ->where('country',Auth::user()->country)
        
        ->get();
        $data['countries'] = Country::get(["name","id"]);

        // dd(Auth::user()->country);   
        return view('frontend.search-photographer',$data);
    }

    public function filterphotographer(Request $request )
    {
        // dd('hello');
        // $users = User::with(['roles' => where('name', 'photographer')
        // ]);
        // return view('frontend.search-photographer')->with('users', $users);
        $data['users'] = User::whereHas('roles' , function($query) {
            $query->where('name','photographer');
        })
        
        ->where('country',$request->country)
        ->where('type_of_shoot',$request->type_of_shoot)

        
        ->get();
        $data['countries'] = Country::get(["name","id"]);

        // dd($request->country,$users);

        // dd(Auth::user()->country);   
        return view('frontend.search-photographer',$data);
    }


    

    
}
