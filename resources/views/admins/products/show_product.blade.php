@extends('admins.layouts.master')

@section('title')
    Products
@endsection


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    @lang('site.details_product')
                </h2>
            </div>

            <!-- Start Card Code -->
            <div class="card show">
                <div class="container-fliud">
                    <div class="wrapper row">
                        <div class="preview col-md-6">

                            <div class="preview-pic tab-content">
                                @foreach($products->images as $k=>$image)
                                    @if($k==0)
                                        <div class="tab-pane active" id="pic-{{$k}}"><img src="{{asset('image_product/'.$image->image)}}" /></div>
                                    @else
                                        <div class="tab-pane" id="pic-{{$k}}"><img src="{{asset('image_product/'.$image->image)}}" style="max-height: 399px" /></div>
                                    @endif
                                @endforeach
                            </div>
                            <ul class="preview-thumbnail nav nav-tabs">
                                @foreach($products->images as $k=>$image)
                                    @if($k==0)
                                        <li class="active"><a data-target="#pic-{{$k}}" data-toggle="tab"><img src="{{asset('image_product/'.$image->image)}}" height='45px' width="80px"/></a></li>
                                    @else
                                        <li><a data-target="#pic-{{$k}}" data-toggle="tab"><img src="{{asset('image_product/'.$image->image)}}" height='45px' width="80px"/></a></li>
                                    @endif
                                @endforeach

                            </ul>

                        </div>
                        <div class="details col-md-6">
                            @if (App::getLocale() == 'ar')
                            <h3 class="product-title">{{$products->name_ar}}</h3>
                            @else
                            <h3 class="product-title">{{$products->name_en}}</h3>
                            @endif
                            <h4 class="price">@lang('site.content'):</h4>
                            @if (App::getLocale() == 'ar')
                            <p class="product-description">{{$products->content_ar}}</p>
                            @else
                            <p class="product-description">{{$products->content_en}}</p>
                            @endif
                            <h4 class="price">@lang('site.price'): <span>{{$products->price}}</span></h4>

                            @foreach ($products->attributes as $attribute)
                            @if (App::getLocale() == 'ar')
                            <h4 class="price">{{$attribute->name_ar}}: <span>{{$attribute->pivot->value_ar}}</span></h4>                                
                            @else
                             <h4 class="price">{{$attribute->name_ar}}: <span>{{$attribute->pivot->value_en}}</span></h4>
                            @endif
                            @endforeach
                            
                            <h4 style="color:green">@lang('site.descount'): 
                                @if($products->descount == null)
                                 <span>null</span> 
                                @else
                                 <span>{{$products->descount}}$</span>
                                @endif
                            </h4>
                            @php
                            $total_price = $products->price * $products->descount/100;
                            $total_descount = $total_price * $products->price;
                            $total_not_descount = $products->price;
                            @endphp
                            <h4 class="price">@lang('site.total_price'): 
                              @if ($products->descount > 0)
                                <span>{{$total_descount}}</span>
                              @else
                                <span>{{$total_not_descount}}</span>
                              @endif
                            </h4>
                            <h4 class="price">@lang('site.category'): 
                                @if (App::getLocale() == 'ar')
                                <span>{{$products->category->name_ar}}</span>
                                @else
                                <span>{{$products->category->name_en}}</span>
                                @endif
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
            <!-- // End Card Code -->

        </div>
    </section>
@endsection
