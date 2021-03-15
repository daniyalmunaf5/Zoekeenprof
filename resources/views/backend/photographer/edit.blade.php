@extends('frontend.layouts.app')

@section('content')
<link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>
                
                <div class="card-body">
                   
                    <form action="{{ route('backend.photographer.update', $user)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}

                        <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" readonly>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                            <input id="name" placeholder="Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="father_name" placeholder="Father Name" type="text" class="form-control @error('father_name') is-invalid @enderror" name="father_name" value="{{ $user->father_name }}" required autocomplete="father_name" autofocus>
                            @error('father_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="address" placeholder="Address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address }}" required autocomplete="address" autofocus>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="company_name" placeholder="Company Name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ $user->company_name }}" required autocomplete="company_name" autofocus>
                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <select class="form-control text-capitalize select" name="country" required id="country">
                                <option value="{{ $user->country }}">{{ $user->country }}</option>   
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
                            @enderror

                            <input id="city" placeholder="City" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ $user->city }}" required autocomplete="city" autofocus>
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="province" placeholder="Province" type="text" class="form-control @error('province') is-invalid @enderror" name="province" value="{{ $user->province }}" required autocomplete="province" autofocus>
                            @error('province')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="postal_code" placeholder="Postal Code" type="number" min="0" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{ $user->postal_code }}" required autocomplete="postal_code" autofocus>
                            @error('postal_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="phone_number" placeholder="Phone Number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $user->phone_number }}" required autocomplete="phone_number" autofocus>
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            

                            <input id="experience" placeholder="Years Of Experience" type="number" min="0" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ $user->experience }}" required autocomplete="experience" autofocus>
                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <input id="profilepic" style="height:48px;" placeholder="profilepic" type="file" class="form-control @error('province') is-invalid @enderror" name="profilepic" value="{{ $user->profilepic }}" required>
                            @error('profilepic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                           
                            
                            <textarea id="description" rows="4" cols="50" placeholder="description" type="text" class="form-control textarea @error('description') is-invalid @enderror" name="description" value="{{ $user->description }}" required autocomplete="description" autofocus>{{ $user->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @can('edit-users')

                            <div class="form-group row">
                                <label for="roles" class="col-md-2 col-form-label text-md-right">Roles</label>

                                <div class="col-md-6">
                                    @foreach($roles as $role)
                                        <div class="form-check">
                                            <input type="checkbox" name="roles[]" value="{{ $role->id}}"
                                            @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                            <label for="">{{ $role->name}}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                @endcan

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
