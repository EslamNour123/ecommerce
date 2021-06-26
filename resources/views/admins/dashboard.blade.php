@extends('admins.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')


<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.dashboard_page')
            </h2>
        </div>
        <!-- Counter Examples -->
        <div class="row clearfix">

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-green">
                        <i class="material-icons">accessibility</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_admin')</div>
                        <div class="number count-to" data-from="0" data-to="{{$users->count()}}" data-speed="1000" data-fresh-interval="20">257</div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-indigo">
                        <i class="material-icons">face</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_user')</div>
                        <div class="number count-to" data-from="0" data-to="{{$users_norml->count()}}" data-speed="1000" data-fresh-interval="20">257</div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-indigo">
                        <i class="material-icons">account_box</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_vendor')</div>
                        <div class="number count-to" data-from="0" data-to="{{$users_vendor->count()}}" data-speed="1000" data-fresh-interval="20">257</div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-purple">
                        <i class="material-icons">bookmark</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_product')</div>
                        <div class="number count-to" data-from="0" data-to="{{$products->count()}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-light-green">
                        <i class="material-icons">tour</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_attributes')</div>
                        <div class="number count-to" data-from="0" data-to="{{$attributes->count()}}" data-speed="1000" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-light-green">
                        <i class="material-icons">category</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_category')</div>
                        <div class="number count-to" data-from="0" data-to="{{$categories->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon icon bg-cyan">
                        <i class="material-icons">favorite</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_subcategory')</div>
                        <div class="number count-to" data-from="0" data-to="{{$subcategories->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div> --}}
            

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-blue">
                        <i class="material-icons">comment</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_comment')</div>
                        <div class="number count-to" data-from="0" data-to="{{$comments->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-teal">
                        <i class="material-icons">verified</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_brand')</div>
                        <div class="number count-to" data-from="0" data-to="{{$brands->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-purple">
                        <i class="material-icons">image</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_image')</div>
                        <div class="number count-to" data-from="0" data-to="{{$images->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-pink">
                        <i class="material-icons">star</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_rating')</div>
                        <div class="number count-to" data-from="0" data-to="{{$ratings->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
          
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-green">
                        <i class="material-icons">list</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_order')</div>
                        <div class="number count-to" data-from="0" data-to="{{$orders->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <div class="info-box hover-zoom-effect">
                    <div class="icon bg-indigo">
                        <i class="material-icons">call</i>
                    </div>
                    <div class="content">
                        <div class="text">@lang('site.total_complaint')</div>
                        <div class="number count-to" data-from="0" data-to="{{$complraints->count()}}" data-speed="1500" data-fresh-interval="20"></div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</section>


@endsection