@extends('users.layouts.master')

@section('title')
    Cart Page
@endsection

@section('content')


	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">
			<div class=" main-content-area">

				<div class="wrap-iten-in-cart">
					<h3 class="box-title">@lang('site.products_name')</h3>
					<ul class="products-cart">

						@foreach ($cart_items as $cart_item)
						<li class="pr-cart-item">
							<div class="product-image">
								@if ($image = $cart_item->attributes->image[0])
								<figure><img src="{{asset('image_product/'.$image)}}" width="100%" height="100%" alt="{{$cart_item->name}}"></figure>
								@endif
							</div>
							<div class="product-name">
								@if (App::getLocale() == 'ar')
								<a class="link-to-product" href="#">{{$cart_item->name}}</a>
								@else
								<a class="link-to-product" href="#">{{$cart_item->attributes->name_en}}</a>
								@endif
							</div>
							@php
								$total_price = $cart_item->price; 
							@endphp
							<div class="price-field produtc-price"><p class="price">{{$total_price}}</p></div>
							<div class="quantity">
								<div class="quantity-input">
									<input type="text" name="product-quatity" value="{{$cart_item->quantity}}" data-max="120" pattern="[0-9]*">									
									<a class="btn btn-increase btn_q" href="{{route('update_p',$cart_item->id)}}"></a>
									<a class="btn btn-reduce btn_q" href="{{route('update_m',$cart_item->id)}}"></a>
								</div>
							</div>
							<div class="price-field sub-total"><p class="price">{{$cart_item->price * $cart_item->quantity}}</p></div>
							<div class="delete">
								<a href="{{route('delete_cart',$cart_item->id)}}" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>
							
						</li>	
						@endforeach											
					</ul>
				</div>

				<div class="summaries">
					<div class="order-summary">
						<h4 class="title-box">@lang('site.order_summary')</h4>
	
                        <p class="summary-info"><span class="title">@lang('site.total')</span><b class="index text-left">{{\Cart::getTotal()}}</b></p>
                        <div style="clear:both"></div>
						<p class="summary-info"><span class="title">@lang('site.shopping')</span><b class="index">@lang('site.free_shopping')</b></p>
                        <div style="clear:both"></div>                        
                        <div style="clear:both"></div>                        
                    </div>
					<div class="checkout-info">
						<a class="btn btn-checkout" href="{{route('create_order')}}">@lang('site.Exection_request')</a><br>
						<a class="link-to-shop" href="{{route('all_products')}}">@lang('site.continue_shopping')<i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
                    </div>

                </div>
                

                


			</div><!--end main content area-->
		</div><!--end container-->

	</main>
    <!--main area-->
    <br>
    <br>




@endsection