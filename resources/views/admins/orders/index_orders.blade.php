@extends('admins.layouts.master')

@section('title')
    Order Page
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.order_page')
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
                                    <th>@lang('site.city')</th> 
                                    <th>@lang('site.address')</th> 
                                    <th>@lang('site.user_name')</th> 
                                    <th>@lang('site.waite')</th> 
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>       
                                @if (Auth::user()->role == 'admin')                             
                                @foreach ($orders as $order)
                                 @foreach ($order->products as $product)
                                  @if ($product->user_id == Auth::user()->id)
                                  <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->city}}</td>
                                    <td>{{$order->address}}</td>
                                    <td>{{$order->user->name}}</td>
                                    @if ($order->status ==  'cansel')
                                     <td style="color:red">Cansel</td>
                                    @elseif($order->status == 'waite' )
                                     <td style="color:rgb(197, 197, 14)">Waite</td>
                                    @else
                                     <td style="color:green">Done</td>
                                    @endif
                                    <td>  
                                        <a href="{{route('show_orders',$order->id)}}" class="btn btn-info">@lang('site.button_show')</a>                                  
                                        <a href="{{route('delete_order',$order->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                        @if ($order->status == 'waite')
                                        <a href="{{route('cansel_order',$order->id)}}" class="btn btn-primary">@lang('site.button_cansel')</a>
                                        @elseif($order->status == 'cansel')
                                        <a href="{{route('done_order',$order->id)}}" class="btn btn-success">@lang('site.button_done')</a>
                                        @else
                                        <a href="{{route('waite_order',$order->id)}}" class="btn btn-warning">@lang('site.burron_wait')</a>
                                        @endif
                                    </td>
                                  </tr> 
                                  @endif
                                 @endforeach    
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                           
                            <div class="d-flex justify-content-center text-center">
                                <small>{{$orders->links()}}</small> 
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