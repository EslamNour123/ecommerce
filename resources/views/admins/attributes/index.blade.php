@extends('admins.layouts.master')

@section('title')
    Attributes
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.attributes_page')
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                         <h2 class="mr-auto">
                            <a style="text-underline-position: under;" href="{{route('create_attribute')}}">@lang('site.create_attribute')</a>
                         </h2>

                         <ul class="header-dropdown m-r--5">
                            <form method="GET" action="{{route('index_attribute')}}" class="form-inline">
                                @csrf
                                <div class="input-group input-group-sm">
                                  <input type="search"name='search'
                                  class="form-control form-control-navbar" placeholder="@lang('site.search')">
                                </div>
                            </form>

                         
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
                                    <th>@lang('site.action')</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attributes as $attribute)
                                <tr>
                                    <td>{{$attribute->id}}</td>
                                    @if (App::getLocale() == 'ar')
                                     <td>{{$attribute->name_ar}}</td>
                                    @else
                                     <td>{{$attribute->name_en}}</td>
                                    @endif                              
                                    <td>                                    
                                        <a href="{{route('update_attribute',$attribute->id)}}" class="btn btn-info">@lang('site.button_update')</a>
                                        <a href="{{route('delete_attributes',$attribute->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>


                     
{{--                            
                            <div class="d-flex justify-content-center text-center">
                                <small>{{$categories->links()}}</small> 
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection