@extends('admins.layouts.master')

@section('title')
    Brands
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.brand_page')
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                         <h2 class="mr-auto">
                            <a style="text-underline-position: under;" href="{{route('create_brand')}}">@lang('site.create_brand')</a>
                         </h2>

                         
                         <ul class="header-dropdown m-r--5">
                            <form method="GET" action="{{route('index_brand')}}" class="form-inline">
                                @csrf
                                <div class="input-group input-group-sm">
                                  <input type="search"name='search'value="{{$search}}"
                                  class="form-control form-control-navbar" placeholder="@lang('site.search')">
                                </div>
                            </form>
                        </ul>
                         
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
                                @foreach ($brands as $brand)
                                 <tr>
                                    <td>{{$brand->id}}</td>
                                    @if (App::getLocale() == 'ar')
                                    <td>{{$brand->name_ar}}</td>
                                    @else
                                    <td>{{$brand->name_en}}</td>
                                    @endif
                                    <td>                                    
                                        <a href="{{route('update_brand',$brand->id)}}" class="btn btn-info">@lang('site.button_update')</a>
                                        <a href="{{route('delete_brand',$brand->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                    </td>
                                  </tr>                                
                                @endforeach
                            </tbody>
                        </table>
                           
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection