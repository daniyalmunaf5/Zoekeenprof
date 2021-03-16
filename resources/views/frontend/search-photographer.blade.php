@extends('frontend.layouts.app')

@section('content')
        <!-- mid section -->
        <!-- <div class="">
            <img class="" src="asset/images/background-6.jpg" style=" width: 100%; height: 350px;">
            <div class="centered">
                <h1 >Over ZoekeenProf</h1>
            </div>
        </div> -->

        <div class="container">
            <div class="row ">
                <div  style="box-shadow: 1px 4px grey; border-left: 1px solid grey;  " class="col-lg-5 col-md-5 mt-5">
                    <br>
                <form method="POST" action="{{route('filter-photographer')}}">
                            @csrf
                    <h3 class="dark-blue" style="font-size: 27px;">Vind Top <span class="sky-blue">Fotografen</span> bij jou in de buurt </h3>
                    <h3 class="dark-blue mt-3" style="font-size: 15px;">lK ZOEK EEN FOTOGRAAF VOOR</h3>
                    <select class="form-control text-capitalize select" name="type_of_shoot" required id="type_of_shoot">
                        <option value="">Select Type Of Shoot</option>   
                        <option value="Landscape">Landscape</option>   
                        <option value="Wildlife">Wildlife</option>   
                        <option value="Macro">Macro</option>   
                        <option value="Underwater">Underwater</option>   
                        <option value="Astrophotography">Astrophotography</option>   
                        <option value="Aerial Photography">Aerial Photography</option>   
                        <option value="Scientific">Scientific</option>   
                        <option value="Portraits">Portraits</option>   
                        <option value="Weddings">Weddings</option>   
                        <option value="Documentary">Documentary</option>   
                        <option value="Sports">Sports</option>   
                        <option value="Commercial">Commercial</option>   
                        <option value="Street Photography">Street Photography</option>   
                        <option value="Event Photography">Event Photography</option>   
                        <option value="Travel">Travel</option>   
                        <option value="Pet Photography">Pet Photography</option>   
                        <option value="Product Photography">Product Photography</option>   
                        <option value="Food">Food</option>   
                        <option value="Still Life Photography">Still Life Photography</option>
                        <option value="Architecture">Architecture</option>   
                        <option value="Other Types of Photography">Other Types of Photography</option>   
                    </select>
                    @error('type_of_shoot')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <h3 class="dark-blue mt-2" style="font-size: 15px;">PLAATS</h3>
                    <select class="form-control text-capitalize select" name="country" >
                        <option value="">Select Country</option>   
                        @foreach ($countries as $country) 
                        <option value="{{$country->name}}">
                        {{$country->name}}
                        </option>
                        @endforeach
                    </select>
                    @error('country')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <input type="submit" value="Search" class="register-button">
                    <a href="{{route('search-photographer')}}"><input type="button" value="Refresh" class="register-button"></a>
                    <br><br>
                </form>

                </div>
                <div class="col-lg-2 col-md-1"></div>
                <div class="justify-items-at-768 col-lg-5 col-md-6 ">
                    <img class="menu-image-1" src="asset/images/m-1.PNG">
                    
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <br><br><br><br>
                <h3 class="black bold mt-2 justify-items-at-768" style="font-size: 28px;">Top 10 fotografen bij jou in de buurt </h3>
                <br>
            </div>
        </div>

        <div class="row" style="background-color: #F5F8FF;">
            <div class="col-md-1"></div>
            <div class="col-md-4 col-12">
                <h3 class="justify-items-at-768 black bold mt-3" style="font-size: 15px;">Wat voor soort zakelijke foto’s wilt u laten nemen? </h3>
            </div>
            
            <div class="col-md-4">
                <form method="POST" action="{{route('filter2-photographer')}}">
                                @csrf
                        <select class=" form-control text-capitalize select" name="type_of_shoot" required id="type_of_shoot">
                            <option value="">Select Type Of Shoot</option>   
                            <option value="Landscape">Landscape</option>   
                            <option value="Wildlife">Wildlife</option>   
                            <option value="Macro">Macro</option>   
                            <option value="Underwater">Underwater</option>   
                            <option value="Astrophotography">Astrophotography</option>   
                            <option value="Aerial Photography">Aerial Photography</option>   
                            <option value="Scientific">Scientific</option>   
                            <option value="Portraits">Portraits</option>   
                            <option value="Weddings">Weddings</option>   
                            <option value="Documentary">Documentary</option>   
                            <option value="Sports">Sports</option>   
                            <option value="Commercial">Commercial</option>   
                            <option value="Street Photography">Street Photography</option>   
                            <option value="Event Photography">Event Photography</option>   
                            <option value="Travel">Travel</option>   
                            <option value="Pet Photography">Pet Photography</option>   
                            <option value="Product Photography">Product Photography</option>   
                            <option value="Food">Food</option>   
                            <option value="Still Life Photography">Still Life Photography</option>
                            <option value="Architecture">Architecture</option>   
                            <option value="Other Types of Photography">Other Types of Photography</option>   
                        </select>
                        @error('type_of_shoot')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
            </div>
            <div class="col-md-2 justify-items-at-768">
                <input style="padding-top: 8px;height: 40px;" type="submit" value="Search" class="register-button">
            </form>
            </div>
            
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <!-- <br> -->
                <!-- <h3 class=" justify-items-at-768 black  mt-3" style="font-size: 14px;">40 fotografen gevonden op basis van 1 filter</h3> -->
                
            </div>
        </div>

        

        <!-- photographer protion -->
        <div class="container">
            <div class="row">

                <div class="col-lg-9 col-sm-12">
                    

                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-10">
                            <br>
                            <h3 class=" black bold mt-2" style="float: right;font-size: 14px;">Relevantie<i style="margin-left: 3px; margin-top: 2px;" class=" fa fa-arrow-down"></i></h3>
                            <h3 class=" grey m-2" style="float: right;font-size: 14px;">Sortering:</h3>
                            <br>
                        </div>
                    </div>

                    <br><br>
                    
                    <!-- photographer -->
                    @if (Session::has('danger'))
                    <div class="alert alert-info">{{ Session::get('danger') }}</div>
                    @endif
                    @foreach($users as $user)
                    
                    <div class="row">
                        <div class="img text-center col-lg-3 col-md-5">
                            <a href="{{ route('profile',$user->id) }}"><img class="img-width-at-992" style="width: 180px;height: 250px;" src="{{asset('../storage/'.$user->profilepic)}}" alt=""></a>
                            <br><br>
                        </div>
                        <div class=" justify-items-at-768 justify-text-at-992 col-lg-8 col-md-7">
                            <a href=""><h3 class="black">{{$user->company_name}}</h3></a>
                            <h3 class="black" style="font-size: 14px; font-weight: lighter;">{{$user->description}}</h3>
                            <div class="" style=" line-height: 32px;">
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-map-marker"></i>{{$user->address}}, {{$user->country}}</h3>
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-star"></i>0 beoordelingen</h3>
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-battery-half"></i>{{$user->experience}} Years of Experience</h3>
                                    <br>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div style="border: 1px solid;;margin-left: 25px;height: 40px;" class=" col-lg-3">
                                    <a href=""><p class="text-center mt-2 bold black">Vraag Offerte </p></a>
                                </div>
                                <!-- <br>
                                <div style="border: 1px solid;;margin-left: 25px;height: 40px;" class="col-lg-3">
                                    <a href="chat.html"><p class="text-center mt-2 bold black"><i class="m-1 fa fa-envelope"></i>Bericht</p></a>
                                </div>
                                <br> -->
            
                                <!-- <div style="border-radius: 30px;background-color: #23B5B5;margin-left: 25px;height: 40px;" class="col-lg-3">
                                    <a href="book-photographer-step-1.html"><p class="text-center mt-2 bold white"><i style="color: white;" class="m-1 fa fa-eur"></i>Prijsopgave</p></a>
                                </div> -->
                            </div>
                            <br>
                        </div>
                    </div><hr>
                    @endforeach

                    
                    <br><br><br><br>

                    <!-- photographer -->
                    <!-- <div class="row">
                        <div class="img text-center col-lg-3 col-md-5">
                            <a href="profile.html"><img class="img-width-at-992" style="width: 160px;" src="asset/images/avatars/avatar-female-round-3.jpg" alt=""></a>
                            <br><br>
                        </div>
                        <div class=" justify-items-at-768 justify-text-at-992 col-lg-8 col-md-7">
                            <a href="profile.html"><h3 class="black">2.Seher Melikoglu-Empower(portret) Fotograaf</h3></a>
                            <h3 class="black" style="font-size: 14px; font-weight: lighter;">Tijdens mijn fotografiesessie empower ik (ondernemende) vrouwen die moeite hebben met zichzelf zichtbaar te maken.lk leer hen om,vol</h3>
                            <div class="" style=" line-height: 32px;">
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-map-marker"></i>Werkgebied Nijmegen</h3>
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-star"></i>17 beoordelingen</h3>
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-battery-half"></i>5 jaar in bedrijf</h3>
                                    <br>
                            </div>

                            <div class="row d-flex justify-content-center">
                                <div style="border: 1px solid;;margin-left: 25px;height: 40px;" class=" col-lg-3">
                                    <a href="profile.html"><p class="text-center mt-2 bold black">Bekijk profiel</p></a>
                                </div>
                                <br>
                                <div style="border: 1px solid;;margin-left: 25px;height: 40px;" class="col-lg-3">
                                    <a href="chat.html"><p class="text-center mt-2 bold black"><i class="m-1 fa fa-envelope"></i>Bericht</p></a>
                                </div>
                                <br>
            
                                <div style="border-radius: 30px;background-color: #23B5B5;margin-left: 25px;height: 40px;" class="col-lg-3">
                                    <a href="book-photographer-step-1.html"><p class="text-center mt-2 bold white"><i style="color: white;" class="m-1 fa fa-eur"></i>Prijsopgave</p></a>
                                </div>
                            </div>

                        </div>
                    </div> -->
                </div>

                
                <div  style="border: 1px solid grey; height: 850px; " class="col-lg-3  mt-5">
                    <br>
                    <h3 class="black">Filters</h3>
                    <h3 class="mt-4 black" style="font-size: 14px; font-weight: lighter;">FOTOGRAAF VOOR</h3>
                    
                <form method="POST" action="{{route('filter2-photographer')}}">
                            @csrf
                    <select class="mt-3 form-control text-capitalize select" name="type_of_shoot" required id="type_of_shoot">
                        <option value="">Select Type Of Shoot</option>   
                        <option value="Landscape">Landscape</option>   
                        <option value="Wildlife">Wildlife</option>   
                        <option value="Macro">Macro</option>   
                        <option value="Underwater">Underwater</option>   
                        <option value="Astrophotography">Astrophotography</option>   
                        <option value="Aerial Photography">Aerial Photography</option>   
                        <option value="Scientific">Scientific</option>   
                        <option value="Portraits">Portraits</option>   
                        <option value="Weddings">Weddings</option>   
                        <option value="Documentary">Documentary</option>   
                        <option value="Sports">Sports</option>   
                        <option value="Commercial">Commercial</option>   
                        <option value="Street Photography">Street Photography</option>   
                        <option value="Event Photography">Event Photography</option>   
                        <option value="Travel">Travel</option>   
                        <option value="Pet Photography">Pet Photography</option>   
                        <option value="Product Photography">Product Photography</option>   
                        <option value="Food">Food</option>   
                        <option value="Still Life Photography">Still Life Photography</option>
                        <option value="Architecture">Architecture</option>   
                        <option value="Other Types of Photography">Other Types of Photography</option>   
                    </select>
                    @error('type_of_shoot')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    <h3 class="black bold mt-3" style="font-size: 15px;">TYPE FOTOSHOOT</h3>
                    <div class="" style=" line-height: 32px;">
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Landscape</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Wildlife</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Macro</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Underwater</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Astrophotography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Aerial Photography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Scientific</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Portraits</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Weddings</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Documentary</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Sports</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Commercial</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Street Photography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Event Photography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Travel</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Pet Photography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Product Photography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Food</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Still Life Photography</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Architecture</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;">Other Types Of Photography</h3>












                    </div>

                    <input type="submit" value="Search" class="register-button">
                    <a href="{{route('search-photographer')}}"><input type="button" value="Refresh" class="register-button"></a>
                    <br><br>
                </form>

                    <br><br>
                    
                </div>
                

            </div>
        </div>

@endsection


