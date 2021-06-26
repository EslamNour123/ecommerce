@extends('layouts.app')

@section('title')
    Login
@endsection



@section('content')

            <div class="container">
            <!-- Basic Validation -->
            <div class="row clearfix">
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            @if ($message = Session::get('message'))
                            <p class='alert alert-danger text-center'>{{$message}}</p>
                           @endif
                            <h2>@lang('site.login')</h2>
                        </div>
                        <div class="body"style="max-height: 400px;">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="email" class="form-control" name="email"  placeholder="@lang('site.email')">
                                    </div>                                   
                                    @error('email')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                   @enderror
                                </div>


                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input id="password" type="password" class="form-control" name="password" placeholder="@lang('site.password')">              
                                    </div>
                                    @error('password')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                   @enderror  
                                </div>
                
                                <button class="btn btn-primary waves-effect" type="submit">@lang('site.submit')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->
         </div>
        </div>
    </section>

    
@endsection
