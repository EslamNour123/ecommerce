@extends('admins.layouts.master')

@section('title')
    Ratings Page
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.rating_page')
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
                                    <th>@lang('site.ratings')</th> 
                                    <th>@lang('site.user')</th> 
                                    <th>@lang('site.product')</th> 
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                                @foreach ($ratings as $rating)
                                <tr>
                                    <td>{{$rating->id}}</td>
                                    <td>{{$rating->rating}}</td>
                                    <td>{{$rating->user->name}}</td>
                                    <td>{{$rating->product->name}}</td>
                                    <td>  
                                        <a href="{{route('delete_ratings',$rating->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                    </td>                               
                                 </tr>
                                @endforeach
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