@extends('admins.layouts.master')

@section('title')
    Update Settings
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
                            <h2>@lang('site.settings')</h2>
                        </div>
                        <div class="body"style="min-height: 197px;">
                            <form method="POST" action="{{route('update_settings_store',$setting->id)}}">
                                @csrf
                                
                                @if (App::getLocale() == 'ar')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="title_ar"  placeholder="@lang('site.title_ar')" 
                                        value="{{$setting->title_ar}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="title_en"  placeholder="@lang('site.title_en')" 
                                        value="{{$setting->title_en}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                
                                @else
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="title_en"  placeholder="@lang('site.title_en')" 
                                        value="{{$setting->title_en}}">
                                   
                                        @error('name_en')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="title_ar"  placeholder="@lang('site.title_ar')" 
                                        value="{{$setting->title_ar}}">
                                   
                                        @error('name_en')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                @endif
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="email"  placeholder="@lang('site.email')" 
                                        value="{{$setting->email}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="phone"  placeholder="@lang('site.phone')" 
                                        value="{{$setting->phone}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="tax"  placeholder="@lang('site.tax')" 
                                        value="{{$setting->tax}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                              
                                <button class="btn btn-primary waves-effect" type="submit">@lang('site.button')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->

        </div>
    </section>




    

@endsection