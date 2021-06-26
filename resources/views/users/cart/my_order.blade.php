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

						@foreach ($orders as $order)
						<li class="pr-cart-item">

							<div class="product-name">
                                <div class="price-field produtc-price"><p class="price">@lang('site.address'): {{$order->address}}</p></div>
                                <div class="price-field produtc-price"><p class="price">@lang('site.city'): {{$order->city}}</p></div>
							</div>
							{{-- @php
								$total_price = $cart_item->price * $cart_item->attributes->descount/100; 
							@endphp --}}
							<div class="price-field produtc-price"><p class="price">@lang('site.tax'): {{$order->tax}}</p></div>
	
							<div class="delete">
								<a href="{{route('order_delete',$order->id)}}" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-times-circle" aria-hidden="true"></i>
								</a>
							</div>

                            <div class="delete">
								<a href="{{route('my_order_details',$order->id)}}" class="btn btn-delete" title="">
									<span>Delete from your cart</span>
									<i class="fa fa-eye" aria-hidden="true"></i>
								</a>
							</div>
							
						</li>	
						@endforeach											
					</ul>
				</div>


			</div><!--end main content area-->
		</div><!--end container-->

	</main>
    <!--main area-->
    <br>
    <br>




@endsection