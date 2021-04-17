@extends('frontend.layouts.app')

@section('content')

    <!-- mid section -->
    <div class="container">
                <br><br><br>

                
                    <!-- <div class="col-lg-2 col-md-1"></div> -->

                    <div class="row">
                    <div class="col-lg-2 col-sm-12">
                    </div>
                    <div class="col-lg-8 col-sm-12">
                        <!-- <i style="float: right; margin-right: 15px;" class="fa fa-times"></i>

                        <div class="text-center line d-flex justify-content-center col-sm-12">
                            <span class="color-fill"></span>
                            <span class="color-fill"></span>
                            <span class="color-fill"></span>
                            <span class="color-fill"></span>

                            <span class="color-unfill"></span>
                        </div> -->
                        <br>    
                        <div class="col-sm-12">
                        <h3 style="font-size:38px;" class="text-center">Stuur een offerte</h3>
                            <br>
                            <form enctype="multipart/form-data" method="POST" action="{{ route('quotesend') }}" enctype="multipart/form-data">
                                @csrf
                                
                                
                                <input type="hidden" id="to_id" name="to_id" value="{{$quote_request->from_id}}">
                                <input type="hidden" id="user_name" name="user_name" value="{{$quote_request->user_name}}">
                                <input type="hidden" id="user_email" name="user_email" value="{{$quote_request->user_email}}">
                                <input type="hidden" id="user_profilepic" name="user_profilepic" value="{{$quote_request->user_profilepic}}">

                                <textarea id="quote" rows="8" cols="50" placeholder="Stuur een offerte" type="text" class="form-control @error('place') is-invalid @enderror"     name="quote" value="{{ old('quote') }}" required autocomplete="quote" ></textarea>
                                @error('quote')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                                <br>
                                <div class="text-center">
                                    <button style="width:180px;" class=" mt-2 btn btn-primary" type="submit" style="border-radius: 20px;">Stuur een offerte</button>
                                </div>
                            </form>
                            <br>
                            <hr style="border: 1px solid;">
                            
                        </div>
                    </div>
                    <div class="col-lg-2 col-sm-12">

                </div>
                </div>
            </div>

@endsection
