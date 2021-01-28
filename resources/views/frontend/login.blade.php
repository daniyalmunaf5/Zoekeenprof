@extends('frontend.customer.layouts.app')

@section('content')
            <div class="hero-text container">
                   
                <div class="row">
                
                    <div class="col-lg-2">
                    </div>
                    
                    <div class="col-lg-8">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <br>
                            <a href="{{ route('frontend.home') }}"><img style="padding-right: 15px;" src="asset/images/logo/Capture.PNG" alt="logo" ></a>
                        <br><br>
                        <h3 class="text-center" >Login Bij ZoekeenProf</h3>

                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                
                        <input id="password" placeholder="Watchwoord" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div >
                        
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label bold" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                        </div>
                        
                        <a><input type="submit" value="Login"></a>
                    </form>

                    </div>
                    <div class="col-lg-2">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </body>
@endsection


