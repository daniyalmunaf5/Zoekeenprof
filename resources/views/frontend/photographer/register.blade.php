

<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <title>ZookeenProf</title>

    <link href="asset/images/logo/Capture-black.PNG" type="image/png" rel="icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="asset/css/demo.css"/>
<link rel="stylesheet" href="asset/css/custom.css"/>
<link rel="stylesheet" href="asset/css/theme2.css"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        function selectElement(id, valueToSelect) {
            let element = document.getElementById(id);
            element.value = valueToSelect;
        }
    </script>
</head>
    <body>  

        <!-- Header -->
        <div class="hero-image-3">
        <div class="container">
            <div id="myTopnav" class="topnav" style="background-color: transparent;">
                <a class="navbar-brand" href="{{ route('frontend.home')}}">
                    <img src="asset/images/logo/Capture.PNG" alt="logo" style="width: 90px; margin-left: 35px;">
                </a>
                <div class="topnav-right" >
                    <!-- <a href="#" class="active">Home</a> -->
                <a href=""></a>
                    <a href="{{ route('about-us')}}" style="color: white;">About Us</a>
                    @if (Route::has('register'))
                    <a href="{{ route('choose-register')}}" style="color: white;">Register</a>
                    @endif
                    @guest
                    @if (Route::has('login'))
                    <a href="{{ route('custom-login')}}" style="color: white;">Login</a>
                    @endif
                    @else
                    <a class="" href="{{ route('logout') }}" style="color: white;"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    @endguest
                    <a style="color: white;" href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <i class="fa fa-bars"></i>
                    </a>
                </div>
            </div>
            <div class="hero-text-2 ">
                <div class="row">
                    <div class="col-lg-2 col-md-1">
                    </div>
                    <div class="col-lg-12 col-md-10">
                        <br><br><br><br><br>
                        <h1 class="text-center white" >Register</h1>
                        <br><br>
                        
                        <form enctype="multipart/form-data" method="POST" action="{{ route('frontend.photographer.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" id="user" name="user" value="photographer">
                            

                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="father_name" placeholder="Father Name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ old('father_name') }}" required autocomplete="father_name" >
                            @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" >
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="company_name" placeholder="Company Name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" >
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- <select class="form-control text-capitalize select @if($errors->get('country')) is-invalid @endif" name="country" value="{{ old('country') }}" required id="country">
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
                            @enderror -->

                            <input id="city" placeholder="City" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" >
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <select style="height:48px;" class="form-control text-capitalize select" name="province" required id="province">
                                <option value="">Select Province</option>   
                                <option value="Drenthe">Drenthe</option>   
                                <option value="Flevoland">Flevoland</option>   
                                <option value="Friesland">Friesland</option>   
                                <option value="Gelderland">Gelderland</option>   
                                <option value="Groningen">Groningen</option>   
                                <option value="Limburg">Limburg</option>
                                <option value="Noord-Brabant">Noord-Brabant</option>   
                                <option value="Noord-Holland">Noord-Holland</option>   
                                <option value="Overijssel">Overijssel</option>   
                                <option value="Zuid-Holland">Zuid-Holland</option>   
                                <option value="Utrecht">Utrecht</option>   
                                <option value="Zeeland">Zeeland</option>   
                            </select>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="postal_code" placeholder="Postal Code" type="text"  class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code" >
                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="phone_number" placeholder="Phone Number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" >
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password" placeholder="password" type="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="experience" placeholder="Years Of Experience" type="number" min="0" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="experience" >
                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <!-- <select style="height:48px;" class="form-control text-capitalize select" name="type_of_shoot" required id="type_of_shoot">
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
                            @enderror -->

                            <!-- <select class="form-control text-capitalize select" name="types_of_shoots[]" id="type_of_shoots" multiple="multiple">
                                <option value="">Select Types Of Shoots</option>   
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
                            @enderror -->

                    

                            <input id="profilepic" style="height:48px;" placeholder="profilepic" type="file" class="form-control @if($errors->get('profilepic')) is-invalid @endif" name="profilepic" value="{{ old('profilepic') }}" required autocomplete="profilepic" >
                            @error('profilepic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <textarea id="description" rows="4" cols="50" placeholder="description" type="text" class="form-control textarea @error('description') is-invalid @enderror" name="description"  required autocomplete="description" >{{ old('description') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            
                            
                            <button type="submit" class="register-button">
                                {{ __('Register') }}
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-1">
                </div>
            </div></div>
        </div>


        <script>
    
    selectElement('province', '{{old('province')}}');
</script>

    <script type="text/javascript">

	function getCities(id,city='')
	{
		var send = 'states=' + id;
		if(city!='')
		{
			var send = 'states=' + id + '&city=' + city;
		}
		$.ajax({
			type: "GET",
			url: "{{ url('get-cities') }}",
			data: send,
			success: function(response){
				$('#city').html(response);
			}
		});
	}

function getstates(id ,states = '')
{	
var send = 'country=' + id + '&states='+states;
$.ajax({
        type: "GET",
        url: "{{ url('get-states') }}",
        data: send,
        success: function(response){
        $('#states').html(response);
        },
        error: function(errormessage) {
        //you would not show the real error to the user - this is just to see if everything is working
        
        }
});
}



$("body").on("change","#country",function(){
    var country = $(this).val();
    getstates(country);
});

$("body").on("change","#states",function(){
    var states = $(this).val();
    getCities(states);
});
 
</script>
    </body>
    
    




