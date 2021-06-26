@extends('admins.layouts.master')

@section('title')
    Index Category
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.category_page')
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                         <h2 class="mr-auto">
                            <a style="text-underline-position: under;" href="{{route('create_category')}}">@lang('site.create_category')</a>
                         </h2>

                         
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            @if ($message = Session::get('message'))
                            <p class='alert alert-success text-center'>{{$message}}</p>
                          @endif
                          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('site.id')</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                <tr>
                                   <td>{{$category->id}}</td>
                                    @if (App::getLocale() == 'ar')
                                     <td>{{$category->name_ar}}</td>
                                    @else
                                     <td>{{$category->name_en}}</td>
                                    @endif
                                    <td>
                                        <img src="{{asset('image_categories/'.$category->image)}}" height='60px' width="100px" alt="">
                                    </td>                                 
                                    <td>                                    
                                        <a href="{{route('update_category',$category->id)}}" class="btn btn-info">@lang('site.button_update')</a>
                                        <a href="{{route('delete_category',$category->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                        <a href="{{route('index_subcategory',$category->id)}}" class="btn btn-success">@lang('site.subcategory')</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                     
                           
                            <div class="d-flex justify-content-center text-center">
                                <small>{{$categories->links()}}</small> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection