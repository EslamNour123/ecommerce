@extends('users.layouts.master')

@section('title')
    About Us
@endsection

@section('content')
    
<div class="about">
    <div class="container"> 
        <h3 class="w3ls-title w3ls-title1">@lang('site.About_Electronic')</h3>
        <div class="about-text">	
            <p>@lang('site.About_Electronic_content')</p> 
            <div class="col-md-3 ftr-top-left about-text-grids">
                <i class="fa fa-shopping-basket" aria-hidden="true"></i>
                <h4>10 @lang('site.Million')+ <br>@lang('site.products')</h4>
            </div>
            <div class="col-md-3 ftr-top-left about-text-grids">
                <i class="fa fa-users" aria-hidden="true"></i>
                <h4>50,000 <br> @lang('site.Sellers') </h4>
            </div>
            <div class="col-md-3 ftr-top-left about-text-grids">
                <i class="fa fa-credit-card" aria-hidden="true"></i>
                <h4>5 @lang('site.Million') <br>@lang('site.Shipments')</h4>
            </div>
            <div class="col-md-3 ftr-top-left about-text-grids">
                <i class="fa fa-globe" aria-hidden="true"></i>
                <h4>4000+ <br>@lang('site.Cities')</h4>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="history">
            <h3 class="w3ls-title">@lang('site.Our_Mission')</h3>
            <p>@lang('site.About_Electronic_content')</p> 
            <h3 class="w3ls-title">@lang('site.our_History')</h3>
            <p>@lang('site.About_Electronic_content')</p> 
        </div>
    </div>
</div>

@endsection