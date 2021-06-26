@extends('layouts.app')

@section('title')
    Register
@endsection

@section('content')

<br>
<br>
<br>
<br>
<div class="container">

    <div class="row clearfix">
        <br>
        
        <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>@lang('site.Register')</h2>
                </div>
                <div class="body"style="max-height: 1000px;">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="name" type="text" class="form-control" name="name" placeholder="@lang('site.name')">
                                @error('name')
                                    <p class='alert alert-danger'>{{$message}}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group form-float">
                            <div class="form-line">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  placeholder="@lang('site.email')">
                                @error('email')
                                    <p class='alert alert-danger'>{{$message}}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group form-float">

                            <div class="form-line">
                                <input id="password" type="password" class="form-control" name="password" placeholder="@lang('site.password')"> 
                                @error('password')
                                <p class='alert alert-danger'>{{$message}}</p>
                                @enderror               
                            </div>
                        </div>

                        <div class="form-group form-float">

                            <div class="form-line">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="@lang('site.password_confirm')" autocomplete="new-password">
                                @error('password')
                                <p class='alert alert-danger'>{{$message}}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group form-float">

                            <div class="form-line">
                                <input id="phone" type="text" class="form-control" name="phone" placeholder="@lang('site.phone')" autocomplete="new-password">
                                @error('phone')
                                <h6 class='alert alert-danger'>{{$message}}</h6>
                               @enderror 
                            </div>
                        </div>


                        <div class="form-group form-float">

                            <div class="form-line">
                                <select name="role" class="form-control @error('role') is-invalid @enderror">
                                    <option value="user">@lang('site.user')</option>
                                    <option value="vendor">@lang('site.vendor')</option>
                                    @error('role')
                                    <small class='alert alert-danger'>{{$message}}</small>
                                    @enderror  
                                </select>   
                            </div>
                        </div>
                      
                        <button class="btn btn-primary waves-effect" type="submit">@lang('site.submit')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Validation -->

</div>


@endsection
