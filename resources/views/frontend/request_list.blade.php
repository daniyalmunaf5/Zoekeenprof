
@extends('frontend.layouts.app')

@section('content')

    <!-- mid section -->
              <div class="row">
                <div class="col-lg-2 col-sm-12">
                </div>
                <div class="col-lg-8 col-sm-12">
                    


                    <br><br>
                    <h1 class="text-center">Request List</h1>
                    <br>
                    <hr>
                    @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    @foreach($quote_requests as $quote_request)
                    
                    
                    <div class="row">
                        <div class="img text-center col-lg-4 col-md-5">
                            <a href=""><img class="img-width-at-992" style="border-radius: 200px;width: 180px;height: 180px;" src="{{asset('../storage/'.$quote_request->user_profilepic)}}" alt=""></a>
                            <br><br>
                        </div>
                        <div class=" justify-items-at-768 justify-text-at-992 col-lg-8 col-md-7">
                            <h3 class="black"><span style="font-weight:none">Quote Request From <span class="sky-blue">{{$quote_request->user_name}}</span></h3>
                            <h3 class="sky-blue" style="font-size: 14px; font-weight: lighter;">{{$quote_request->user_email}}</h3>
                            <div class="" style=" line-height: 32px;">
                            <br>
                                    <h3 class="black" style="font-size: 16px; font-weight: lighter;">Place Of Shoot : <span class="sky-blue" style="font-size: 20px; font-weight: bold;">{{$quote_request->place}}</span></h3>
                                    <h3 class="black" style="font-size: 16px; font-weight: lighter;">Date Of Shoot : <span class="sky-blue" style="font-size: 20px; font-weight: bold;">{{$quote_request->date_of_shoot}}</span></h3>
                                    <h3 class="black" style="font-size: 16px; font-weight: lighter;">Type Of Shoot : <span class="sky-blue" style="font-size: 20px; font-weight: bold;">{{$quote_request->type_of_shoot}}</span></h3>
                                    
                            </div>

                            <div style="float:right;" class="row justify-text-at-992">
                            <a href="{{ route('quoteindex',$quote_request->id) }}"><button style="width:180px;" class="mt-2 btn btn-primary" type="button" style="border-radius: 20px;">Stuur een offerte</button></a>
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

                    
                    <br><br><br><br><br><br><br>

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
                <div class="col-lg-2 col-sm-12">

                </div>
              </div>
@endsection
