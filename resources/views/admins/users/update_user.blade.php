@extends('admins.layouts.master')

@section('title')
    Update User
@endsection

@section('content')


    <section class="content ">
        <div class="container">

            <!-- Basic Validation -->
            <div class="row clearfix">
                <br>
                <br>
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>@lang('site.update_user')</h2>
                        </div>
                        <div class="body"style="height: 127px;">
                            <form method="POST" action="{{ route('update_user_store',$users->id) }}">
                                @csrf
                                
                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <select name="role" class="form-control">
                                            <option value="user">@lang('site.user')</option>
                                            <option value="vendor">@lang('site.vendor')</option>
                                            <option value="admin">@lang('site.admin')</option>
                                        </select>   
                                        @error('role')
                                            <p class="alert alert-danger">{{$message}}</p>
                                        @enderror
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