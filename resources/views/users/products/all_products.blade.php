@extends('users.layouts.master')

@section('title')
    All Products
@endsection

@section('content')
    
	<!-- products -->
	<div class="products">	 
		<div class="container">
			<div class="col-md-12 product-w3ls-right">
				<!-- breadcrumbs --> 
				<ol class="breadcrumb breadcrumb1">
					<li><a href="{{route('index')}}">@lang('site.home_page')</a></li>
					<li class="active">@lang('site.products')</li>
				</ol> 
				<div class="clearfix"> </div>
				<!-- //breadcrumbs -->
				<div class="product-top">
					<h4>@lang('site.products')</h4>
					<div class="clearfix"> </div>
				</div>
				<div class="products-row">
					@if ($products->isNotEmpty())
					@foreach ($products as $product)
					<div class="col-md-3 product-grids"> 
						<div class="agile-products">
							<div class="new-tag"><h6>@lang('site.new')</h6></div>
							 @if ($image = $product->images[0])
							 <a href="{{route('details_prodcut',$product->slug)}}"><img src="{{asset('image_product/'.$image->image)}}" class="img-responsive" alt="@lang('site.Audio_Speaker')"></a>
							 @endif
							<div class="agile-product-text">              
								 @if (App::getLocale() == 'ar')
								 <h5><a href="{{route('details_prodcut',$product->slug)}}">{{$product->name_ar}}</a></h5> 
								 @else
								 <h5><a href="{{route('details_prodcut',$product->slug)}}">{{$product->name_en}}</a></h5> 
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
					@else
					<br>
					<br>
						<h4 class="alert alert-success text-center">@lang('site.product_not_fount')</h4>
					@endif
					<div class="clearfix"> </div>
				</div>
			</div>
	
			<div class="clearfix"> </div>
            <!-- recommendations carosel -->
			<br>
			<br>

			<div class="recommend">
                <script>
					$(document).ready(function() { 
						$("#owl-demo5").owlCarousel({
					 
						  autoPlay: 3000, //Set AutoPlay to 3 seconds
					 
						  items :4,
						  itemsDesktop : [640,5],
						  itemsDesktopSmall : [414,4],
						  navigation : true
					 
						});
						
					}); 
				</script>

<div class="welcome"> 
	<div class="container"> 
		<div class="welcome-info">
			<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

				<div class="clearfix"> </div>
				<h3 class="w3ls-title">@lang('site.featured_products')</h3>
				<br>
				<div id="myTabContent" class="tab-content">
					<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
						<div class="tabcontent-grids">  
							<div id="owl-demo" class="owl-carousel"> 

								@foreach ($products as $product)
								<div class="item">
									<div style="height: 280px;" class="glry-w3agile-grids agileits"> 
										@if($image = $product->images[0])
										<a href="{{route('details_prodcut',$product->slug)}}" style="height: 92%">                                       
										  <img src="{{asset('image_product/'.$image->image)}}" width="100%" height= "82%" alt="{{$product->slug}}">
										</a>
									   @endif  
										 <div class="view-caption agileits-w3layouts">           
											@if (App::getLocale() == 'ar')
											<h4><a href="products.html">{{$product->name_ar}}</a></h4>
											@else
											<h4><a href="products.html">{{$product->name_en}}</a></h4>
											@endif
											{{-- <p>Lorem ipsum dolor sit amet consectetur</p> --}}
											<h5>${{$product->price}}</h5>
											<form action="{{route('add_cart',$product->id)}}" method="post">
												@csrf
												<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i>@lang('site.add_to_card')</button>
											</form>
										</div>         
									</div>  
								</div>
								@endforeach
 
							</div> 
						</div>
					</div>
				</div>   
			</div>  
		</div>  	
	</div>  	
</div>   
			</div>
			<!-- //recommendations -->
		</div>
	</div>
	<!--//products--> 

@endsection