@extends('admins.layouts.master')

@section('title')
    Create User
@endsection

@section('content')


    <section class="content ">
        <div class="container">

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>@lang('site.create_user')</h2>
                        </div>
                        <div class="body"style="height: 425px;">
                            <form method="POST" action="{{ route('create_user_store') }}" enctype='multipart/form-data'>
                                @csrf
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name" required placeholder="@lang('site.name')" 
                                        value="{{ old('name') }}">
                                   
                                        @error('name')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="@lang('site.email')">
                                    </div>
                                </div>


                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required placeholder="@lang('site.password')">                
                                    </div>
                                </div>

                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input type="file" class="form-control" name='image'value=''placeholder="Upload Image">
                                        
                                    </div>
                                </div>

                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="@lang('site.phone')" required autocomplete="new-password">
                                    </div>
                                </div>


                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <select name="role" class="form-control">
                                            <option value="user">@lang('site.user')</option>
                                            <option value="vendor">@lang('site.vendor')</option>
                                            <option value="admin">@lang('site.admin')</option>
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
    </section>




    

@endsection