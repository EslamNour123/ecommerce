@extends('admins.layouts.master')

@section('title')
    Settings Page
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.settings')
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            @if ($message = Session::get('message'))
                            <p class='alert alert-success text-center'>{{$message}}</p>
                          @endif
                          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('site.id')</th>
                                    <th>@lang('site.title')</th> 
                                    <th>@lang('site.tax')</th> 
                                    <th>@lang('site.email')</th> 
                                    <th>@lang('site.phone')</th> 
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                                <td>{{$setting->id}}</td>
                                @if (App::getLocale() == 'ar')
                                <td>{{$setting->title_ar}}</td>
                                @else
                                <td>{{$setting->title_en}}</td>
                                @endif
                                <td>{{$setting->tax}}</td>
                                <td>{{$setting->email}}</td>
                                <td>{{$setting->phone}}</td>
                                <td>
                                  <a href="{{route('update_settings')}}" class="btn btn-info">@lang('site.update_settings')</a>
                                </td>
                            </tbody>
                        </table>
                           
                            {{-- <div class="d-flex justify-content-center text-center">
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