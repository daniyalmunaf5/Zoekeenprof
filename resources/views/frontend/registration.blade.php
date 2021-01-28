@extends('frontend.layouts.app')

@section('content')
        <!-- mid section -->

        <div class="container">

<div class="row mt-5">
    <div class="col-md-6">
        <br>
        <h2 style="font-size: 38px;" class="black justify-items-at-768 bold">Laat <span class="sky-blue">je bedrijf</span> zien</h2>
        <h2 style="font-size: 38px;" class="black justify-items-at-768 bold">in de <span class="sky-blue">top 10!</span></h2>
        <br>
        <p class="justify-items-at-768 bold" style="line-height: 0px;">Trustoo brengt je in contact met</p>
        <p class="justify-items-at-768 bold" style="line-height: 0px;">nieuwe klanten in jouw regio</p>
        <img class="img-display-none-at-768" style="width: 50%; float: right;" src="asset/images/5.png" alt="">
    </div>
    <div class="col-md-1"></div>
    
    <div  class="col-lg-5 col-md-5 ">
        <br>
        <h3 class="dark-blue justify-items-at-768" style="font-size: 27px;">Meld je bedrijf gratis aan</h3>
        <h3 class="black justify-items-at-768 mt-3" style="font-size: 12px;">Ontvang gerichte aanvragen via jouw bedrijfsprofiel</h3>
        <input style=" height: 40px;" type="text" placeholder="bijv. bruiloft">
        <h3 class="black text-center " style="font-size: 12px;">OF</h3>
        <input style=" height: 40px;margin-top: 0px;font-family: FontAwesome; border-radius: 40px;" placeholder='&#xf041 Nijmegen' type="text">
        <h3 class="black " style="float: right; text-decoration: underline; font-size: 12px;">Jouw bedrijf niet in de lijst?</h3>
        <br>
        <!-- <div class="row justify-items-at-992 mt-2">        
            <div class="col-lg-12 mt-2">
                <div class="row">
                    <div class=" col-lg-1">
                        <img  class="m-2" src="asset/images/ir-1.PNG" alt="">
                    </div>
                    <div class="col-lg-11">
                        <p class="black" style="padding-left: 10px; font-size: 10px;">Je gegevens worden alleen gebruikt voor 
                            de verwerking van deze aanmelding, zie 
                                                             ons privacy statement</p>
                        
                    </div>
                </div>
            </div>

            
        </div> -->
        <a href="{{ route('choose-register')}}"><input  style="height: 48px;" type="submit" value="Gratis aanmelden"></a>
    </div>

    

</div>


<div class="row mt-5">
    <div  style="box-shadow: 1px 4px grey; border-left: 1px solid grey;   height: 380px; " class="col-md-4">
        <br>
        <img src="asset/images/b-1.PNG" alt="">
        <h3 class="black mt-2 ">Hoe werkt?</h3>
        <div class="" style=" line-height: 32px;">
            <h3 class="black" style="font-size: 16px; font-weight: lighter;"><i style="color: #0080ff;" class="m-1 fa fa-check"></i>Maak een onderscheidend profiel in de top 10 (gratis)</h3>
            <h3 class="black" style="font-size: 16px; font-weight: lighter;"><i style="color: #0080ff;" class="m-1 fa fa-check"></i>Word gekozen door nieuwe klanten op basis van dit profiel</h3>
            <h3 class="black" style="font-size: 16px; font-weight: lighter;"><i style="color: #0080ff;" class="m-1 fa fa-check"></i>Haal de opdracht binnen en ga aan de slag</h3>
            <br>
        </div>
        <input type="submit" value="Brochure aanvragen">
    </div>
    <div class="col-md-1"></div>

    <div class="col-md-7">
        <br>
        <div class="box_root__31i08  box_videoBox__3bSvS " style="background-color: rgb(255, 255, 255);">
            <video controls="" style="max-width: 100%;">
                <source src="asset/video/song.mp4" type="video/mp4">
                Je browser ondersteunt geen HTML video.
            </video>
            <br><br><br>
        </div>
    </div>
        
        
    
    
    <div class="row justify-items-at-992 mt-5">
        
        <h3 class="dark-blue">De voordelen op een rijtje</h3>
        <br><br>
        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-1.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Kwalitatieve aanvragen</h3>
                    <p  style="font-size: 16px;">Doordat bezoekers via jouw profiel 
                        contact opnemen, hebben ze 
                        eigenlijk al gekozen voor jouw 
                        profiel.</p>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-2.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Onderscheidend profiel in top 10</h3>
                    <p style="font-size: 16px;">Optimaliseer je profiel en word 
                        getoond op een Premium positie in 
                        de top 10.</p>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-3.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue" >Direct contact met de klant</h3>
                    <p style="font-size: 16px;">Neem contact op met de klant via 
                        mail, telefoon of chat.</p>
                    
                </div>
            </div>
        </div>

        <div><br><br></div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-4.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Bepaal je regio en 
                        werkzaamheden</h3>
                    <p  style="font-size: 16px;">Je kan zelf bepalen welk type 
                        opdrachten je wilt ontvangen en uit 
                        welke regio
                        </p>
                    
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-5.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Verzamel reviews</h3>
                    <p  style="font-size: 16px;">Verzamel reviews met onze 
                        reviewtool en verhoog je online 
                        reputatie</p>

                    
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-6.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Geen abonnements kosten
                    </h3>
                    <p  style="font-size: 16px;">Je betaalt enkel per 
                        offerteaanvraag. En is het toch niet 
                        wat je ervan verwacht, zijn we 
                        dagelijks opzegbaar.</p>

                    
                </div>
            </div>
        </div>

        <div><br><br></div>


        
        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-7.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Reclamatieservice</h3>
                    <p  style="font-size: 16px;">Is er iets mis met een ontvangen 
                        aanvraag? Laat het ons weten. Je 
                        betaalt alleen voor de aanvragen 
                        waar jij wat aan hebt.
                        </p>

                    
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-8.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Telefoonnummer op jouw profiel
                    </h3>
                    <p  style="font-size: 16px;">Kom direct in contact met de klant 
                        door je telefoonnummer op jouw 
                        profiel te plaatsen.
                        </p>

                    
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-2">
            <div class="row">
                <div class="img col-12">
                    <img style="width: 45px;" src="asset/images/i-9.PNG" alt="">
                </div>
                <div class="text col-12">
                    <h3 class="dark-blue">Wees flexibel
                    </h3>
                    <p  style="font-size: 16px;">Bepaal zelf hoeveel aanvragen je 
                        wilt ontvangen per week. Heb je 
                        even genoeg werk, dan pauzeer je 
                        het profiel.
                        </p>

                    
                </div>
            </div>
        </div>
    </div>

</div>
</div>

<br><br><br>
<div class="row" style="background-color: black;height: 140px;">
<div class="col-6">
    <br><br>
    <h3 class="text-center white bold mt-3" style="font-size: 16px;">Less meer Zoeleenprof</h3>
</div>

<div class="col-6 text-center justify-items-at-768">
    <br><br>

    <input style=" height: 40px; width: 200px; padding-top: 8px;" type="submit" value="Brochure aanvragen">
</div>
</div>

<div class="container">
<div class="row">
    <div class="col-1"></div>
    <div class="col-10">
        <br>
        <h3 class="justify-items-at-992 black">Wat anderen zeggen</h3>
        <br>
    </div> 
    <div class="col-1"></div>
</div>
</div>

<div class="hero-image-6">
<div class="hero-text-6 container">
    <div class="row">
        <div class="col-lg-4 col-md-3 col-2"></div>
        <div class="col-lg-4 col-md-6 col-8">
        <h3 style="font-size: 16px;">      “Trustoo is voor mij een geschikt 
            platform. De aanvragen leveren 9 van 
                de 10 keer werk op! Een aanrader 
                       voor iedere ondernemer.”</h3>

        </div>
        <div class="col-lg-4 col-md-3 col-2"></div>
    </div>
</div>
</div>
<br><br><br>

<div class="row" style="background-color: black;height: 140px;">
<div class="col-6">
    <br><br>
    <h3 class="text-center white bold mt-3" style="font-size: 16px;">Kom ook in contact met nieuwe klanten!</h3>
</div>

<div class="col-6 text-center justify-items-at-768">
    <br><br>

    <input style=" height: 40px; width: 200px; padding-top: 8px;" type="submit" value="Gratis aanmelden">
</div>
</div>

<br><br>
<div class="row" style="background-color: #F5F6FA;height: 100%;">
<div class="col-12 col-md-6">
    <div class="row">
        <div class="col-lg-3 col-2 col-md-1"></div>
        <div class="col-lg-8 col-8 col-md-10 justify-items-at-768">
            <br><br>
            <h3 class=" bold mt-3 dark-blue">Veelgestelde vragen</h3>
            <br>
            <div class="" style=" line-height: 35px;">
                <h3 class="black mt-4" style="font-size: 16px; font-weight: lighter;">Maak een onderscheidend profiel in <img style="float: right;" src="asset/images/right-arrow.png" alt=""></h3>
                <h3 class="black mt-4" style="font-size: 16px; font-weight: lighter;">Hoe verhoog ik de Trustoo score?<img style="float: right;" src="asset/images/right-arrow.png" alt=""></h3>
                <h3 class="black mt-4" style="font-size: 16px; font-weight: lighter;">Hoeveel aanvragen kan ik verwachten?<img style="float: right;" src="asset/images/right-arrow.png" alt=""></h3>
                <h3 class="black mt-4" style="font-size: 16px; font-weight: lighter;">Wat kost een offerte aanvraag?<img style="float: right;" src="asset/images/right-arrow.png" alt=""></h3>
                <h3 class="black mt-4" style="font-size: 16px; font-weight: lighter;">Zijn er er nog andere kosten?<img style="float: right;" src="asset/images/right-arrow.png" alt=""></h3>
                <h3 class="black mt-4" style="font-size: 16px; font-weight: lighter;">Hoe kan ik contact opnemen met de klant?<img style="float: right;" src="asset/images/right-arrow.png" alt=""></h3>
                <br>
                <br>
            </div>
        </div>
        <div class="col-lg-1 col-2 col-md-1"></div>
    </div>
</div>

<div class="col-12 col-md-6 text-center d-flex">
    <div class="row">
        <div class="col-12">
            <br><br>
            <h3 class=" bold mt-3 dark-blue">Wij staan je graag te woord</h3>
            <br><br>
        </div>
        <div class="col-12">
            <img src="asset/images/logo/Capture.PNG" style="margin-right: 25px;" alt="">
            <br><br>
        </div>
        <div class="col-12">
            <input style=" font-size: x-large;height: 70px; width: 250px; padding-top: 8px;" type="submit" value="020 26 21 267">
        <br><br>
        </div>

</div>
</div>
@endsection


