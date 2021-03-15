

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
                    <!-- @if (Route::has('register'))
                    <a href="{{ route('registration')}}">Register</a>
                    @endif -->
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
            @yield('content')

                

</html>
          