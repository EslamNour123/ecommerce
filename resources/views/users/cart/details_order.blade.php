@extends('users.layouts.master')

@section('title')
    Cart Page
@endsection

@section('content')


	<!--main area-->
	<main id="main" class="main-site">

		<div class="container">
            @if ($message = Session::get('message'))
                <p class='alert alert-success text-center'>{{$message}}</p>
             @endif
			<div class=" main-content-area">

				<div style="min-height:250px;" class="wrap-iten-in-cart">
					<h3 class="box-title">@lang('site.order')</h3>
					<ul class="products-cart">

						@foreach ($order_products as $order_product)
						<li class="pr-cart-item">

							<div class="product-name">
                                @if (App::getLocale() == 'ar')
                                <div class="price-field produtc-price"><p class="price">@lang('site.name'): {{$order_product->product->name_ar}}</p></div>
                                @else
                                <div class="price-field produtc-price"><p class="price">@lang('site.name'): {{$order_product->product->name_en}}</p></div>
                                @endif
                                
                                <div class="price-field produtc-price"><p class="price">@lang('site.quantity'): {{$order_product->quantity}}</p></div>
                                <div class="price-field produtc-price"><p class="price">@lang('site.price'): {{$order_product->price}}</p></div>
                            </div>
							{{-- @php
								$total_price = $cart_item->price * $cart_item->attributes->descount/100; 
							@endphp --}}
							
						</li>	
						@endforeach	
					</ul>
					<div class="price-field produtc-price"><p class="price">@lang('site.total_price'): {{$order->total_price_after_tax}}</p></div>

				</div>


			</div><!--end main content area-->
		</div><!--end container-->

	</main>
    <!--main area-->
    <br>
    <br>




@endsection