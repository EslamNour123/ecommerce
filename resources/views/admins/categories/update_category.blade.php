@extends('admins.layouts.master')

@section('title')
    Update Category
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
                            <h2>@lang('site.update_category')</h2>
                        </div>
                        <div class="body"style="min-height: 197px;">
                            <form method="POST" action="{{route('update_category_store',$categories->id)}}" enctype='multipart/form-data'>
                                @csrf
                                
                                @if (App::getLocale() == 'ar')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_ar"  placeholder="@lang('site.name_ar')" 
                                        value="{{$categories->name_ar}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_en"  placeholder="@lang('site.name_en')" 
                                        value="{{$categories->name_en}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                @else
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_ar"  placeholder="@lang('site.name_ar')" 
                                        value="{{$categories->name_ar}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_en"  placeholder="@lang('site.name_en')" 
                                        value="{{$categories->name_en}}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                    
                                @endif

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="file" class="form-control" name='image'value="@lang('site.image')"placeholder="">
                                   
                                        @error('image')
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