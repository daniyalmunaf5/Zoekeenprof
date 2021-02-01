@extends('frontend.layouts.app')

@section('content')
        <!-- mid section -->
        <div class="container">
            <div class="row mt-5">
                <div class="col-md-8 margin_top search ">
                    <h1 class="d-flex justify-content-between">Zoek naar een fotograaf in uw buurt</h1>
                    <div class="col-lg-8 col-sm-12">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" style=" height: 40px;margin-top: 0px;font-family: FontAwesome; border-radius: 40px;" placeholder='&#xf041 U Can Search Here AnyThing...' aria-label="Recipient's username" aria-describedby="basic-addon2">
                            
                        </div>
                    </div>
                    <div class="input-group-append">
                        <a href="{{route('search-photographer')}}"><button class="btn btn-primary search_button" type="button" style="border-radius: 20px;">Search</button></a>
                      </div>
                    
                </div>
                <div class='col-md-4 d d-flex justify-content-center mt-5'>
                    <img src="asset/images/Capture1.PNG" alt="logo" style=" width: 350px;">
                </div>
            </div>

            <div class="row">
                
                <div class="col-sm-12 mt-5">
                    <h3 class="text-center">Zoek naar een fotograaf drhyw?</h3>
                    <p class="text-center">jhdncu hjsdw hjads hswjma</p>
                    
                    <div id="caleandar" class="mt-1 d-flex justify-content-center pr-5">

                    </div>
                
                    
                </div>
                
            </div>

            <div class="row justify-items-at-992 mt-5">
                <h3>Waaroom ZookenProf?</h3>

                <div class="col-md-4 mt-2">
                    <div class="row">
                        <div class="img col-lg-4">
                            <img src="asset/images/1.PNG" alt="">
                        </div>
                        <div class="text col-lg-8">
                            <h3>Qualified Teachers</h3>
                            <p>We are partner with ent requirements of exam boards.</p>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-2">
                    <div class="row">
                        <div class="img col-lg-4">
                            <img src="asset/images/2.PNG" alt="">
                        </div>
                        <div class="text col-lg-8">
                            <h3 >More thanements</h3>
                            <p>We are partner with more thanements of exam boards.</p>
                            
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mt-2">
                    <div class="row">
                        <div class="img col-lg-4">
                            <img src="asset/images/3.PNG" alt="">
                        </div>
                        <div class="text col-lg-8">
                            <h3 >With Morethan</h3>
                            <p>We are partner with more than 200 nts of exam boards.</p>
                            
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row justify-items-at-768 mt-5">
                <div class="col-md-5 d-flex justify-image">
                    <img src="asset/images/4.PNG" alt="logo" style=" width: 250px;">
                </div>

                <div class="col-md-6 col-lg-5 text mt-4">
                    <h4 class="mb-4">Overal beschikbaar in Nederland</h4>
                    <hr>
                    <h6 class="">Bij Zoekeenprof hebben we alle bedrijven in Nederland objectief en onafhankelijk beoordeeld.Of je nu in het kleinste dorp of in de grootste stad woont,op Zoekeenprof vind je de beste bedrijven in jouw regio</h6>
                </div>

                
            </div>

            <div class="row mt-5">
                <div class="col-md-3 col-6">
                    <ul>
                        <li>Noord-Holland</li>
                        <li>Zuid-Holland</li>
                        <li>Zeeland</li>
                    </ul>
                </div>
                
                <div class="col-md-3 col-6">
                    <ul>
                        <li>Noord-Brabant</li>
                        <li>Utrecht</li>
                        <li>Flevoland</li>
                    </ul>
                </div>
                
                <div class="col-md-3 col-6">
                    <ul>
                        <li>Friesland</li>
                        <li>Groningen</li>
                        <li>Drenthe</li>
                    </ul>
                </div>
                
                <div class="col-md-3 col-6">
                    <ul>
                        <li>Overijssel</li>
                        <li>Gelderland</li>
                        <li>Limburg</li>
                    </ul>
                </div>
            </div>

            

        </div>

@endsection


