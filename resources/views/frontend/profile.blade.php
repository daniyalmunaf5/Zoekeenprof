@extends('frontend.layouts.app')

@section('content')

        <!-- mid section -->
        <div class="container">
                <br><br><br>
                <div class="row">
                    <div class="img text-center col-lg-6 col-md-5">
                        <img style="width: 350px;height: 350px;border-radius: 200px;" src="{{asset('../storage/'.$user->profilepic)}}" alt="">
                    </div>
                    <div class=" justify-items-at-768 justify-text-at-992 col-lg-5 col-md-7">
                        <br><br>
                        <h1>{{$user->company_name}}</h1>
                        <br><br>
                        <div style=" line-height: 32px;">
                            <ul >
                                <li><i style="color: #0103a1;" class="m-1 fa fa-map-marker"></i>{{$user->address}}, {{$user->country}}</li>
                                <li><i style="color: #0103a1;" class="m-1 fa fa-star"></i>0 beoordelingen</li>
                                <li><i style="color: #0103a1;" class="m-1 fa fa-battery-half"></i>{{$user->experience}} Years of Experience</li>
                                <br><br><br><br>
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center">
                @can('admin-user')
                    
                <div style="border: 1px solid;;margin-left: 25px;" class=" col-md-3">
                        <a href="{{ route('requestquoteindex',$user->id) }}"><p class="text-center mt-2 bold black"><i class="m-1 fa fa-envelope"></i>Vraag Offerte</p></a>
                    </div>
                    @endcan
                    <br>

                    <!-- <div style="border: 1px solid;;margin-left: 25px;" class="col-md-3">
                        <a href="book-photographer-step-1.html"><p class="text-center mt-2 bold black"><i class="m-1 fa fa-eur"></i>prijsopgave</p></a>
                    </div> -->
                </div>
                <br><br><br>

                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <h3 class="black bold">Over {{$user->company_name}}:</h3>
                        <br>
                        <p class="black">{{$user->description}}</p>
                        <br>
                        <h3 class="black bold">Photgraphy Portfolio </h3>
                        <br>
                        <div class=row>
                         @foreach($portfolio_image as $portfolio_image)

                            <div class="col-lg-3 col-md-6">
                                <img width="100%" height="150px" src="{{asset('../storage/app/'.$portfolio_image->filename)}}" alt="">
                                <br><br>
                            </div>

                        @endforeach
                        
                        </div>


                        <!-- <br>
                        <div class=row>
                            <div class="col-lg-3 col-md-6">
                                <img width="100%" src="{{ asset('asset/images/P-5.PNG') }}" alt="">
                                <br><br>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <img width="100%" src="{{ asset('asset/images/P-6.PNG') }}" alt="">
                                <br><br>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <img width="100%" src="{{ asset('asset/images/P-7.PNG') }}" alt="">
                                <br><br>
                            </div>

                            <div class="col-lg-3 col-md-6">
                                <img width="100%" src="{{ asset('asset/images/P-8.PNG') }}" alt="">
                                <br><br>
                            </div>
                        </div> -->

                        <br><br>
                        <h3 class="black bold">Diensten</h3>
                        <div class="row">
                            <div class="col-6 ">
                                <p class="black"><i style="color: #0103a1;" class="m-1 fa fa-check"></i>Reclamefotografie</p>
                            </div>
                            
                            <div class="col-6 ">
                                <p class="black"><i style="color: #0103a1;" class="m-1 fa fa-check"></i>Reportage</p>
                            </div>
                        </div>

                    </div>          
                    

                    <div class="col-sm-1"></div>
                </div>
            </div>


@endsection
