<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quote_request;
use App\Models\Quote;
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

    public function requestlist()
    {
        // dd($portfolio_image[1]->filename);
        $quote_requests = Quote_request::where('to_id',Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get();
        

        if($quote_requests->isEmpty())
        {
            Session::flash('message', "No Request Found");
            
            return view('frontend.request_list')->with([
                'quote_requests' => $quote_requests
                ]);

        }
        else
        {

            return view('frontend.request_list')->with([
                'quote_requests' => $quote_requests
                ]);
        }
    }

    public function quotelist()
    {
        // dd($portfolio_image[1]->filename);
        // dd('da');
        // $quotes = Quote::all();
        $quotes = Quote::where('to_id',Auth::user()->id)
        ->where('accept_or_reject',NULL)
        ->orderBy('created_at', 'desc')
        ->get();
        

        if($quotes->isEmpty())
        {
            Session::flash('message', "No Quotes Found");
            
            return view('frontend.quote_list')->with([
                'quotes' => $quotes
                ]);

        }
        else
        {

            return view('frontend.quote_list')->with([
                'quotes' => $quotes
                ]);
        }
    }

    public function acceptedquotes()
    {
        // dd($portfolio_image[1]->filename);
        // dd('da');
        // $quotes = Quote::all();
        $quotes = Quote::where('to_id',Auth::user()->id)
        ->where('accept_or_reject','1')
        ->orderBy('created_at', 'desc')
        ->get();
        

        if($quotes->isEmpty())
        {
            Session::flash('messages', "No Quotes Found");
            
            return view('frontend.acceptedquotes')->with([
                'quotes' => $quotes
                ]);

        }
        else
        {

            return view('frontend.acceptedquotes')->with([
                'quotes' => $quotes
                ]);
        }
    }

    public function acceptedquotesPhotographer()
    {
        // dd($portfolio_image[1]->filename);
        // dd('da');
        // $quotes = Quote::all();
        $quotes = Quote::where('from_id',Auth::user()->id)
        ->where('accept_or_reject','1')
        ->orderBy('created_at', 'desc')
        ->get();
        

        if($quotes->isEmpty())
        {
            Session::flash('messages', "No Quotes Found");
            
            return view('frontend.acceptedquotesPhotographer')->with([
                'quotes' => $quotes
                ]);

        }
        else
        {

            return view('frontend.acceptedquotesPhotographer')->with([
                'quotes' => $quotes
                ]);
        }
    }


    public function quoteindex(Quote_request $quote_request)
    {
        // dd($portfolio_image[1]->filename);
        // dd($quote_request->from_id);
        return view('frontend.quote_index')->with([
            'quote_request' => $quote_request
            ]);
    }

    public function quotesend(Request $request)
    {
        $valiedation_from_array = [
             
            'quote' => 'required'
           
            
            ];

            

            $this->validate($request, $valiedation_from_array);

            $quote = new Quote();
            $quote->from_id = Auth::user()->id;
            $quote->to_id = request('to_id');
            $quote->user_name = request('user_name');
            $quote->user_email = request('user_email');
            $quote->user_profilepic = request('user_profilepic');
            $quote->photographer_name = Auth::user()->name;
            $quote->photographer_email = Auth::user()->email;
            $quote->photographer_profilepic = Auth::user()->profilepic;
            $quote->quote = request('quote');
            $quote->save();

            return view('frontend.index');

    }

    public function requestquoteindex(User $user)
    {
        // dd($portfolio_image[1]->filename);
        return view('frontend.request_quote_index')->with([
            'user' => $user
            ]);
    }

    public function requestquotesend(Request $request)
    {
        $valiedation_from_array = [
             
            'place' => 'required',
            'date_of_shoot' => 'required',
            'type_of_shoot' => 'required'
            
            ];

            

            $this->validate($request, $valiedation_from_array);

            $quoterequest = new Quote_request();
            $quoterequest->from_id = Auth::user()->id;
            $quoterequest->to_id = request('to_id');
            $quoterequest->user_name = Auth::user()->name;
            $quoterequest->user_email = Auth::user()->email;
            $quoterequest->user_profilepic = Auth::user()->profilepic;
            $quoterequest->place = request('place');
            $quoterequest->date_of_shoot = request('date_of_shoot');
            $quoterequest->type_of_shoot = request('type_of_shoot');
            $quoterequest->save();

            return view('frontend.index');

    }

    public function acceptquote(Request $request, Quote $quote)
    {
        $quote = DB::table('quotes')->where('accept_or_reject', '=', NULL)->update(array('accept_or_reject' => '1'));
        return redirect()->back();
    }

    public function deletequote(Request $request, Quote $quote)
    {
        $quote = DB::table('quotes')->where('accept_or_reject', '=', NULL)->update(array('accept_or_reject' => '0'));
        return redirect()->back();
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
