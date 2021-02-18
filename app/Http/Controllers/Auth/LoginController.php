<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    //  protected function authenticated($request, $user)
    //  {
    //      return $user;
    //  }

    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectTo()
    {
        if(Auth::user()->hasRole('admin')){
            $this->redirectTo = route('backend.users.index');
            // dd($country);
            return $this->redirectTo;
        }
        if(Auth::user()->hasRole('photographer')){
            $this->redirectTo =  route('backend.photographer.index',Auth::user()->id);
            // dd($country);
            return $this->redirectTo;
        }
       
        $this->redirectTo = route('frontend.home'); 
        return $this->redirectTo;

    }
}
