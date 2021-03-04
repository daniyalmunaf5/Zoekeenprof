@extends('layouts.app')

@section('content')
<link href="{{ asset('asset/css/custom.css') }}" rel="stylesheet">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Profile') }}</div>
                
                <div class="card-body">
                   
                    <form action="{{ route('multiuploads')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input  style="height: 52px;" id="profilepic"  type="file" class="form-control" name="photos[]"  multiple>
                            @error('profilepic')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
