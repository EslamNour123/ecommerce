@extends('admins.layouts.master')

@section('title')
    Create Attribute
@endsection

@section('content')
    
<section class="content ">
    <div class="container">

        <!-- Basic Validation -->
        <div class="row clearfix">
            <br>
            <br>
            <br>
            <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>@lang('site.create_attributes')</h2>
                    </div>
                    <div class="body"style="min-height: 197px;">
                        <form method="POST" action="{{route('create_attributes_store') }}">
                            @csrf
                            
                            @if (App::getLocale() == 'ar')
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name_ar"  placeholder="@lang('site.name_ar')" 
                                    value="{{ old('name_ar') }}">
                               
                                    @error('name_ar')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                   @enderror
                                </div>
                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name_en"  placeholder="@lang('site.name_en')" 
                                    value="{{ old('name_en') }}">
                               
                                    @error('name_en')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                   @enderror
                                </div>
                            </div>
                            @else
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name_ar"  placeholder="@lang('site.name_ar')" 
                                    value="{{ old('name_ar') }}">
                               
                                    @error('name_ar')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                   @enderror
                                </div>
                            </div> 
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <input type="text" class="form-control" name="name_en"  placeholder="@lang('site.name_en')" 
                                    value="{{ old('name_en') }}">
                               
                                    @error('name_en')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                   @enderror
                                </div>
                            </div>
                            @endif
                          
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