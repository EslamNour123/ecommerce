@extends('users.layouts.master')

@section('title')
    Category
@endsection

@section('content')
    
	<!-- breadcrumbs --> 
	<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="{{route('index')}}">@lang('site.home')</a></li>
			<li class="active">@lang('site.category')</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			<div class="single-page">
				<div class="single-page-row" id="detail-21">
					<div class="col-md-6 single-top-left">	
						<div class="flexslider">
							<ul class="slides">
                                @foreach ($product->images as $image)
                                <li data-thumb="{{asset('image_product/'.$image->image)}}">
									<div class="thumb-image detail_images"> <img src="{{asset('image_product/'.$image->image)}}" data-imagezoom="true" class="img-responsive" alt="{{$product->name}}"> </div>
								</li>
                                @endforeach
							</ul>
						</div>
					</div>
					<div class="col-md-6 single-top-right">
						@if (App::getLocale() == 'ar')
						<h3 class="item_name">{{$product->name_ar}}</h3>
						@else
						<h3 class="item_name">{{$product->name_en}}</h3>
						@endif
						<div class="single-price">
							<ul>
                                @php
                                  $total_price = $product->price * $product->descount/100;
                                  $total_not_descount = $product->price;
                                @endphp
								@if ($product->descount > 0)
								<li>${{$total_price}}</li>  
								@else
								<li>${{$total_not_descount}}</li>  
								@endif

								<li><del>${{$product->price}}</del></li> 
								<li><span class="w3off">{{$product->descount}}%</span></li> 

								<li>{{$product->created_at}}</li> <br>
								@foreach ($product->attributes as $attribute)
								 @if (App::getLocale() == 'ar')
								 <li>{{$attribute->name_ar}}:  {{$attribute->pivot->value_ar}}/ </li>									
								 @else
								 <li>{{$attribute->name_en}}:  {{$attribute->pivot->value_en}}/ </li>									
								 @endif
								@endforeach

							</ul>	
						</div> 
						 @if (App::getLocale() == 'ar')
						 <p class="single-price-text">{{$product->content_ar}} </p>
						 @else
						 <p class="single-price-text">{{$product->content_en}} </p>
						 @endif
						<form action="{{route('add_cart',$product->id)}}" method="post"> 
							@csrf
							<button type="submit" class="w3ls-cart" ><i class="fa fa-cart-plus" aria-hidden="true"></i> Add to cart</button>
						</form>
					</div>
				   <div class="clearfix"> </div>  
				</div>
				<div class="single-page-icons social-icons"> 
					<ul>
						<li><h4>@lang('site.share_on')</h4></li>
						<li><a href="http://www.facebook.com" class="fa fa-facebook icon facebook"> </a></li>
						<li><a href="http://www.twitter.com" class="fa fa-twitter icon twitter"> </a></li>
						<li><a href="http://www.googleplus.com" class="fa fa-google-plus icon googleplus"> </a></li>
						<li><a href="http://www.dribbble.com" class="fa fa-dribbble icon dribbble"> </a></li>
						<li><a href="http://www.rss.com" class="fa fa-rss icon rss"> </a></li> 
					</ul>
				</div>

				
				<section class="content-item" id="comments">
					<div class="container">   
						<div class="row">
							<div class="col-sm-8">   
								<form method='post' action="{{route('create_comment')}}">
									@csrf
									<h3 class="pull-left">@lang('site.new_comments')</h3>
									<fieldset>
										<div class="row">
											<div class="col-sm-3 col-lg-2 hidden-xs">
												<img class="img-responsive" src="{{ asset ('images_users/users/'.Auth::user()->image)}}" alt="">
											</div>
											<div class="form-group col-xs-12 col-sm-9 col-lg-10">
												<textarea class="form-control" name='content' id="message" placeholder="@lang('site.write_message')"></textarea>
													@error('content')
													<h6 class='alert alert-danger'>{{$message}}</h6>
												   	@enderror
													<input  type="hidden" name="product_id" readonly value="{{$product->id}}">
													<button type="submit" class="btn btn-normal pull-right">@lang('site.send')</button>
											   </form>
											</div>
										</div>  	
									</fieldset>
								</form>
								<h3>{{$comment_count}} :@lang('site.comments')</h3>	
								@if ($comment_count >= 1)
								  @foreach ($comments as $comment)

								  @if ($comment->parent_id == null)
								  <div class="media">
									<a class="pull-left" href="#"><img class="media-object" src="{{ asset ('images_users/users/'.$comment->user->image)}}" alt="bla bla bla"></a>
									<div class="media-body">
										<h4 class="media-heading">{{$comment->user->name}}</h4>
										<p>{{$comment->content}}</p>
										<ul class="list-unstyled list-inline media-detail pull-left">
											<li><i class="fa fa-calendar"></i>{{$comment->created_at}}</li>
											{{-- <li><i class="fa fa-thumbs-up"></i>13</li> --}}
										</ul>
										<ul class="list-unstyled list-inline media-detail pull-right">
											{{-- <li class=""><a href="">@lang('site.like')</a></li> --}}
											<li class=""><a href="{{route('index_subcomment',$comment->id)}}">@lang('site.reply')</a></li>
											@if ($comment->user_id == Auth::user()->id)
											<li class=""><a href="{{route('update_comment',$comment->id)}}">@lang('site.update')</a></li>
											<li class=""><a href="{{route('delete_comment',$comment->id)}}">@lang('site.delete')</a></li>												
											@endif
										</ul>
									</div>
								</div>
								  @endif

								  @endforeach
								  @else
								  <h3 class="alert alert-success" style="padding:12px;"> @lang('site.no_comment')</h3>
								  @endif	
					
								<div class="d-flex justify-content-center text-center">
									<small>{{$comments->links()}}</small> 
								</div>
								<!-- COMMENT 1 - START -->

							
							</div>
						</div>
					</div>
				</section>
				

			</div> 

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
            
                                            @foreach ($products2 as $product)
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
	</div>
	<!--//products-->  

@endsection