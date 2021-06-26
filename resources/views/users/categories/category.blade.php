@extends('users.layouts.master')

@section('title')
    Category
@endsection

@section('content')
    
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-9 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="{{route('index')}}">@lang('site.home')</a></li>
					<li class="active">@lang('site.product')</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>@lang('site.product')</h4>
					<ul> 
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('site.Filter')<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="{{route('low_price',$category->id)}}">@lang('site.Low_price')</a></li> 
								<li><a href="{{route('high_price',$category->id)}}">@lang('site.High_price')</a></li> 
							</ul> 
						</li>

						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('site.categories')<span class="caret"></span></a>
							<ul class="dropdown-menu">
								@foreach ($category->childs as $child)
									@if (App::getLocale() == 'ar')
									<li><a href="{{route('ProductChilds',$child->id)}}">{{$child->name_ar}}</a></li> 																		 
									@else
									<li><a href="{{route('ProductChilds',$child->id)}}">{{$child->name_en}}</a></li> 																		 
									@endif
								@endforeach
							</ul> 
						</li>
						
						<li class="dropdown head-dpdn">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('site.brand')<span class="caret"></span></a>
							<ul class="dropdown-menu">
								@foreach ($brands as $brand)
								 @if (App::getLocale() == 'ar')
								 <li><a href="{{route('brands',$brand->id)}}">{{$brand->name_ar}}</a></li> 
								 @else
								 <li><a href="{{route('brands',$brand->id)}}">{{$brand->name_en}}</a></li> 
								 @endif
								@endforeach
                            </ul> 
						</li>
					</ul> 
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
                    
                    @foreach ($products as $product)
                    <div class="col-md-3 product-grids"> 
						<div style="max-height: 251px;" class="agile-products">
							<div class="new-tag"><h6>{{$product->descount}}%</h6></div>            
                            @if($image = $product->images->first())
                             <a href="{{route('details_prodcut',$product->slug)}}" style="height: 92%">                                       
                                <a href="{{route('details_prodcut',$product->slug)}}"><img src="{{asset('image_product/'.$image->image)}}" height="160px;" alt="img"></a>
                             </a>
                             @endif
                            <div class="agile-product-text">    
								@if (App::getLocale() == 'ar')
								<h5><a href="single.html">{{$product->name_ar}}</a></h5> 
								@else
								<h5><a href="single.html">{{$product->name_en}}</a></h5> 
								@endif          
                                 @php
                                   $total_price = $product->price - $product->descount/100;
                                 @endphp
								<h6><del>${{$product->price}}</del> ${{$total_price}}</h6> 
								<form action="{{route('add_cart',$product->id)}}" method="post">
									@csrf
									<button type="submit" class="w3ls-cart pw3ls-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i>@lang('site.add_cart')</button>
								</form> 
							</div>
						</div> 
					</div> 
                    @endforeach

					<div class="clearfix"> </div>
				</div>
				<!-- add-products --> 

				<!-- //add-products -->
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!--//products-->   
@endsection