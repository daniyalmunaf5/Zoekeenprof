

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
                    <a href="{{ route('registration')}}" style="color: white;">Register</a>
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
            <div style="top:35%;" class="hero-text-2 ">
                <div class="row">
                    <div class="col-lg-2 col-md-1">
                    </div>
                    <div class="col-lg-12 col-md-10">
                        <h1 style="font-weight: 100;" class="text-center Black" >Select Type Of Shoot</h1>
                        <br>
                        <h5 class="text-center bold sky-blue">Press Ctrl to select more than One</h5>
                        
                        <form enctype="multipart/form-data" method="POST" action="{{ route('Select-typeofshoot') }}" enctype="multipart/form-data">
                            @csrf

                            

                            <select style="height:350px; " class="form-control text-capitalize" name="types_of_shoots[]" id="type_of_shoots" multiple="multiple">
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

                            
                            
                            
                            <button  type="submit" class="register-button">
                                {{ __('Submit') }}
                            </button>
                        </form>
                    </div>
                    <div class="col-lg-2 col-md-1">
                </div>
            </div></div>
        </div>


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
    
 
    




