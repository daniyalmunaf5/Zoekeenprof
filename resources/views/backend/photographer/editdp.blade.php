@extends('frontend.layouts.app')

@section('content')
<link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">
                            <br><br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">
                <div class="card-header">{{ __('Upload Image') }}</div>
                
                <div class="card-body">
                   
                <form action="{{ route('backend.photographer.updatedp', $user)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{method_field('PUT')}}
                        <input id="profilepic" style="height:48px;" placeholder="profilepic" type="file" class="form-control @error('profilepic') is-invalid @enderror" name="profilepic" value="$user->profilepic" required>
                            @error('profilepic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </form>
                </div>
                                       

            </div>
                 <br><br>                            <br><br>
                            <br><br>

                            <br><br>
        </div>
    </div>
</div>
@endsection
