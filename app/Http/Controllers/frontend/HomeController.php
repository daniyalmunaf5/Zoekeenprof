<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

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

        $users = User::whereHas('roles' , function($query) {
            $query->where('name','photographer');
        })->get();
        return view('frontend.search-photographer')->with('users',$users);
    }
    
}
