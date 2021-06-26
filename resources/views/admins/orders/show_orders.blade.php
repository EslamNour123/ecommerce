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
                                    <th>@lang('site.name_product')</th>
                                    <th>@lang('site.price')</th>
                                    <th>@lang('site.total_price')</th> 
                                    <th>@lang('site.quantity')</th> 
                                    <th>@lang('site.tax')</th> 
                                    <th>@lang('site.total_price_after_tax')</th> 
                                </tr>
                            </thead>
                            <tbody>                                    
                                @foreach ($orders->products as $product)
                                @if ($product->user_id == Auth::user()->id)
                                <tr>
                                    @if (App::getLocale() == 'ar')
                                    <td>{{$product->name_ar}}</td>
                                    @else
                                    <td>{{$product->name_en}}</td>
                                    @endif
                                    <td>{{$product->pivot->price}}</td>
                                    <td>{{$product->pivot->total_price}}</td>
                                    <td>{{$product->pivot->quantity}}</td>

                                    <td>{{$orders->tax}}</td>
                                    <td>{{$orders->total_price_after_tax}}</td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection