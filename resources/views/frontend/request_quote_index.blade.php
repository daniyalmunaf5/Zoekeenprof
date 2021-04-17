@extends('frontend.layouts.app')

@section('content')

    <!-- mid section -->
    <div class="container">
                <br><br><br>

                <div class="row">
                    <div class="col-lg-4 col-md-4 text-center mt-5">
                        <div class="row">
                            <div class="img col-lg-12">
                                <img style="width: 200px;height: 200px;" src="{{asset('../storage/'.$user->profilepic)}}" alt="">
                            </div>
                            <div class="text col-lg-12">
                                <br>
                                <h3>{{$user->company_name}}</h3>
                                <br><br><br>
                                <!-- <h5 class="sky-blue bold">Details</h5> -->

                                <!-- <div style=" line-height: 32px;text-align: start;display: flex;justify-content: flex-start;"> -->
                                <div style=" line-height: 32px;">
                                <ul >
                                    <li><i style="color: #0080ff;" ></i>{{$user->province}}, {{$user->country}}</li>
                                    <li><i style="color: #0080ff;" ></i>{{$user->email}}</li>
                                    <li><i style="color: #0080ff;" ></i>{{$user->experience}} Years of Experience</li>
                                    <br><br><br><br>
                                    
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col-lg-2 col-md-1"></div> -->

                    <div class="col-lg-8 col-md-7 ">
                        <!-- <i style="float: right; margin-right: 15px;" class="fa fa-times"></i>

                        <div class="text-center line d-flex justify-content-center col-sm-12">
                            <span class="color-fill"></span>
                            <span class="color-fill"></span>
                            <span class="color-fill"></span>
                            <span class="color-fill"></span>

                            <span class="color-unfill"></span>
                        </div> -->
                        <br>    
                        <div class="col-sm-12">
                        <h3 style="font-size:38px;" class="text-center">Offerte</h3>
                            <br>
                            <form enctype="multipart/form-data" method="POST" action="{{ route('requestquotesend') }}" enctype="multipart/form-data">
                                @csrf
                                
                                <input type="hidden" id="to_id" name="to_id" value="{{$user->id}}">
                                <input type="hidden" id="user_name" name="user_name" value="{{$user->name}}">
                                <input type="hidden" id="user_email" name="user_email" value="{{$user->email}}">
                                <input type="hidden" id="user_profilepic" name="user_profilepic" value="{{$user->profilepic}}">


                                <label for="" class="bold ">Place Of Shoot</label>
                                <input id="place" placeholder="Place of Shoot" type="text" class="form-control @error('place') is-invalid @enderror"     name="place" value="{{ old('place') }}" required autocomplete="place" >
                                @error('place')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label for="" class="bold ">Date Of Shoot</label>
                                <input id="date_of_shoot"  type="date" class="form-control @error('date_of_shoot') is-invalid @enderror" name="date_of_shoot" value="{{ old('date_of_shoot') }}" required autocomplete="date_of_shoot" >
                                @error('date_of_shoot')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                    <br>
                                <label for="" class="bold mt-2">Type Of Shoot</label>

                                <select style="height:250px; " class="form-control text-capitalize" name="type_of_shoot" id="type_of_shoot" multiple="multiple">
                                    <!-- <option value="">Select Types Of Shoots</option>    -->
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
                                @error('types_of_shoots')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <br>
                                <button type="submit" class="register-button">
                                {{ __('Vraag Offerte') }}
                                </button>
                            </form>
                            <br>
                            <hr style="border: 1px solid;">
                            
                        </div>
                    </div>
                </div>
            </div>

@endsection
