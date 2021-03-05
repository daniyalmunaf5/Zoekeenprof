<!DOCTYPE html>
<html>
<head>
    <!-- CSS only -->
    <title>ZookeenProf</title>

    <link href="asset/images/logo/Capture-black.PNG" type="image/png" rel="icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="{{ asset('asset/css/demo.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/theme2.css') }}" rel="stylesheet">
<link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
<script src="{{ asset('js/app.js') }}" defer></script>

<meta name="viewport" content="width=device-width, initial-scale=1">

<script type="text/javascript" src="asset/js/jquery-2.1.4.min.js"></script>

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



$("body").on("change",,function(){
    var country = $(this).val();
    getstates(country);
});

$("body").on("change","#states",function(){
    var states = $(this).val();
    getCities(states);
});

</script>
</head>
    <body>  

        <!-- Header -->
        <div id="myTopnav" class="topnav">
            <a class="navbar-brand" href="{{ route('frontend.home')}}">
                <img src="{{ asset('asset/images/logo/Capture.PNG') }}" alt="logo" style="width: 90px; margin-left: 35px;">
            </a>
            <div class="topnav-right">
                <!-- <a href="#" class="active">Home</a> -->
                <a href=""></a>
                @can('edit-users')
                <a href="{{ route('backend.users.index')}}">Dashboard</a>
                @endcan
                @can('photographer-user-dashboard')
                <a href="{{ route('backend.photographer.index',Auth::user()->id)}}">My Profile</a>
                @endcan
                
                <a href="{{ route('about-us')}}">About Us</a>

                @guest
                @if (Route::has('register'))
                <a href="{{ route('registration')}}">Register</a>
                @endif
                @if (Route::has('login'))
                <a href="{{ route('custom-login')}}">Login</a>
                @endif
                @else
                <a class="" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @endguest
                
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                  </a>
            </div>
        </div>

        
        <!-- header end -->
            @yield('content')
           <!-- footer -->
           <div class="row footer mt-5">
            <div class="col-lg-9 col-md-9">
                <img src="{{ asset('asset/images/logo/Capture-black.PNG') }}" alt="logo" style=" margin-top: 15px;margin-left: 20px;width: 190px;">
                <h4>Over ZoeleenProf</h4>
                <h4>Bedrijf aanmeldon</h4>
                <h4 class="mt-5">Privacy Statement</h4>


                
            </div>

            

            <div class="col-lg-3 col-md-3 footer-at-768">
                <h3>Klanten</h3>
                <h3 class="bold">vertellen</h3>
                <div class="rating">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                </div>
                <p class="reviews">143 reviews</p>
                <br>
                <p style="margin-left: 38px;">2020</p>
                <p>info@trustoo.nl</p>

                <br><br><br>

            </div>
        </div>
    </body>

    <script type="text/javascript" src="{{ asset('asset/js/caleandar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/demo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/js/custom.js') }}"></script>




    
</html>
