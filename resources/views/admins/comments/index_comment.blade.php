@extends('admins.layouts.master')

@section('title')
    Comments Page
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.comment_page')
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
                                    <th>@lang('site.content')</th> 
                                    <th>@lang('site.user')</th> 
                                    <th>@lang('site.product')</th> 
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>                                    
                                @foreach ($comments as $comment)
                                <tr>
                                    <td>{{$comment->id}}</td>
                                    <td>{{substr($comment->content,0,50)}}</td>
                                    <td>{{$comment->user->name}}</td>
                                    <td>{{$comment->product->name}}</td>
                                    <td>  
                                        <a href="{{route('show_comments',$comment->id)}}"data-toggle="modal"  class="btn btn-warning">@lang('site.button_show')</a>                                  
                                        <a href="{{route('delete_comments',$comment->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
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