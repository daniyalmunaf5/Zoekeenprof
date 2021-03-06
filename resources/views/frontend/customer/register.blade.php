@extends('frontend.customer.layouts.app')

@section('content')
<script>
        function selectElement(id, valueToSelect) {
            let element = document.getElementById(id);
            element.value = valueToSelect;
        }
    </script>
            <div class="hero-text-3">
                <div class="row">
                    <div class="col-lg-2 col-md-1">
                    </div>
                    <div class="col-lg-12 col-md-10">
                        <br><br><br><br><br>
                        <h1 class="text-center sky-blue" >Register</h1>
                        <br><br>

                        <form method="POST" enctype="multipart/form-data" action="{{ route('frontend.customer.store') }}">
                            @csrf

                            <input type="hidden" id="user" name="user" value="customer">

                            <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>
                            @error('address')
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

                            <input id="city" placeholder="City" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
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

                            <input id="postal_code" placeholder="Postal Code" type="text"  class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ old('postal_code') }}" required autocomplete="postal_code" autofocus>
                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="phone_number" placeholder="Phone Number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
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

                            <input id="profilepic" style="height:48px;" placeholder="profilepic" type="file" class="form-control @error('province') is-invalid @enderror" name="profilepic" value="{{ old('profilepic') }}" required autocomplete="profilepic" autofocus>
                            @error('profilepic')
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
    </body>
    <script>
    
    selectElement('province', '{{old('province')}}');
</script>
@endsection


