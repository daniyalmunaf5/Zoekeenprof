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
                    <h3 class="dark-blue" style="font-size: 27px;">Vind een Top 10 <span class="sky-blue">Fotograaf</span> in <span class="sky-blue">Nijmegen</span></h3>
                    <h3 class="dark-blue mt-3" style="font-size: 15px;">lK ZOEK EEN FOTOGRAAF VOOR</h3>
                    <input style=" height: 40px;" type="text" placeholder="bijv. bruiloft">
                    <h3 class="dark-blue mt-2" style="font-size: 15px;">PLAATS</h3>
                    <input style=" height: 40px;margin-top: 0px;font-family: FontAwesome; border-radius: 40px;" placeholder='&#xf041 Nijmegen' type="text">
                    <input type="submit" value="Search">
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
                <h3 class="black bold mt-2 justify-items-at-768" style="font-size: 28px;">Top 10 fotografen in Nijmegen </h3>
                <br>
            </div>
        </div>

        <div class="row" style="background-color: #F5F8FF;">
            <div class="col-md-1"></div>
            <div class="col-md-4 col-12">
                <h3 class="justify-items-at-768 black bold mt-3" style="font-size: 15px;">Wat voor soort zakelijke foto’s wilt u laten nemen? </h3>
            </div>
            <div class="col-md-4">
                <input style=" height: 40px; border-radius: 0px;" type="text" placeholder="bijv. zakelijk portret,bedrijfsfotografie of productfotografie">
            </div>
            <div class="col-md-2 justify-items-at-768">
                <input style=" height: 40px; width: 120px; padding-top: 8px;" type="submit" value="Zoekeen">
            </div>
        </div>

        <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
                <br>
                <h3 class=" justify-items-at-768 black  mt-3" style="font-size: 14px;">40 fotografen gevonden op basis van 1 filter</h3>
                
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
                    @foreach($users as $user)

                    <div class="row">
                        <div class="img text-center col-lg-3 col-md-5">
                            <a href="profile.html"><img class="img-width-at-992" style="width: 160px;" src="asset/images/avatars/avatar-female-round-2.jpg" alt=""></a>
                            <br><br>
                        </div>
                        <div class=" justify-items-at-768 justify-text-at-992 col-lg-8 col-md-7">
                            <a href="profile.html"><h3 class="black">{{$user->company_name}}</h3></a>
                            <h3 class="black" style="font-size: 14px; font-weight: lighter;">{{$user->description}}</h3>
                            <div class="" style=" line-height: 32px;">
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-map-marker"></i>{{$user->address}}</h3>
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-star"></i>0 beoordelingen</h3>
                                    <h3 class="black" style="font-size: 14px; font-weight: lighter;"><i style="color: #0103a1;" class="m-1 fa fa-battery-half"></i>{{$user->experience}} Years of Experience</h3>
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
                            <br>
                        </div>
                    </div><hr>
                    @endforeach

                    
                    <br><br><hr><br><br>

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

                
                <div  style="border: 1px solid grey; height: 500px; " class="col-lg-3  mt-5">
                    <br>
                    <h3 class="black">Filters</h3>
                    <h3 class="mt-4 black" style="font-size: 14px; font-weight: lighter;">FOTOGRAAF VOOR</h3>
                    <input style=" height: 45px;border-radius: 0px; border-color: black;" type="text" placeholder="Zakelijk">
                    <br><br>
                    <h3 class="black bold mt-2" style="font-size: 15px;">TYPE FOTOSHOOT</h3>
                    <div class="" style=" line-height: 32px;">
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;"><input class="m-1" type="radio">Zakelijk portret</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;"><input class="m-1" type="radio">Bedrijfsfotografie</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;"><input class="m-1" type="radio">Productfotografie</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;"><input class="m-1" type="radio">Reportage</h3>
                        <h3 class="black" style="font-size: 14px; font-weight: lighter;"><input class="m-1" type="radio">Zakelijk overig</h3>
                        <br>
                    </div>
                    <input type="submit" value="Vergelijk prijsopgaven">
                </div>
                

            </div>
        </div>

@endsection


