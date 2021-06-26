<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<title>@yield('title')</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Smart Bazaar Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>

<!-- Custom Theme files -->
<link href="{{url('user_page/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('user_page/css/bootstrap-rtl.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{url('user_page/css/style.css')}}" rel="stylesheet" type="text/css" media="all" /> 
	@if (App::getLocale() == 'ar')
	<link href="{{url('user_page/css/style.rtl.css')}}" rel="stylesheet" type="text/css" media="all" /> 
	@else
	<link href="{{url('user_page/css/style.css')}}" rel="stylesheet" type="text/css" media="all" /> 
	@endif
<link href="{{url('user_page/css/menu.css')}}" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="{{url('user_page/css/menu.rtl.css')}}" rel="stylesheet" type="text/css" media="all" /> <!-- menu style --> 
<link href="{{url('user_page/css/ken-burns.css')}}" rel="stylesheet" type="text/css" media="all" /> <!-- banner slider --> 
<link href="{{url('user_page/css/animate.min.css')}}" rel="stylesheet" type="text/css" media="all" /> 
<link href="{{url('user_page/css/owl.carousel.css')}}" rel="stylesheet" type="text/css" media="all"> <!-- carousel slider -->  
<!-- //Custom Theme files -->

<!-- font-awesome icons -->
<link href="{{url('user_page/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->

<!-- js -->
<script src="{{url('user_page/js/jquery-2.2.3.min.js')}}"></script> 
<script src="{{url('user_page/js/owl.carousel.js')}}"></script>
<script src="{{url('user_page/js/bootstrap.js')}}"></script>


<!--flex slider-->
<script defer src="{{url('user_page/js/jquery.flexslider.js')}}"></script>
<link rel="stylesheet" href="{{url('user_page/css/flexslider.css')}}" type="text/css" media="screen" />
<script>
	// Can also be used with $(document).ready()
	$(window).load(function() {
	  $('.flexslider').flexslider({
		animation: "slide",
		controlNav: "thumbnails"
	  });
	});
</script>
<!--flex slider-->

<script src="{{url('user_page/js/imagezoom.js')}}"></script>
<!-- //js --> 
<script src="{{url('user_page/js/owl.carousel.js')}}"></script>  
<script>
	$(document).ready(function() { 
		$("#owl-demo").owlCarousel({ 
		  autoPlay: 3000, //Set AutoPlay to 3 seconds 
		  items :4,
		  itemsDesktop : [640,5],
		  itemsDesktopSmall : [480,2],
		  navigation : true
	 
		}); 
	}); 
	</script>
<!-- web-fonts -->
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lovers+Quarrel' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Offside' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Tangerine:400,700' rel='stylesheet' type='text/css'>
<!-- web-fonts --> 

<!-- scroll to fixed--> 
<script src="{{url('user_page/js/jquery-scrolltofixed-min.js')}}" type="text/javascript"></script>
<script>
    $(document).ready(function() {

        // Dock the header to the top of the window when scrolled past the banner. This is the default behaviour.

        $('.header-two').scrollToFixed();  
        // previous summary up the page.

        var summaries = $('.summary');
        summaries.each(function(i) {
            var summary = $(summaries[i]);
            var next = summaries[i + 1];

            summary.scrollToFixed({
                marginTop: $('.header-two').outerHeight(true) + 10, 
                zIndex: 999
            });
        });
    });
</script>
<!-- //scroll to fixed--> 

<!-- start-smooth-scrolling -->
<script type="text/javascript" src="{{url('user_page/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{url('user_page/js/easing.js')}}"></script>	
<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
			});
		});
</script>
<!-- //end-smooth-scrolling -->

<!-- smooth-scrolling-of-move-up -->
<script type="text/javascript">
	$(document).ready(function() {
	
		var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
		};
		
		$().UItoTop({ easingType: 'easeOutQuart' });
		
	});
</script>
<!-- //smooth-scrolling-of-move-up -->  

</head>
<body>

	<div class="header">
		<div class="w3ls-header"><!--header-one--> 

			<div class="w3ls-header-right container">
				
				<ul>			
					
					
					<li class="dropdown head-dpdn">
						<img src="{{ asset ('images_users/users/'.Auth::user()->image)}}" width="30" height="30" style="border-radius: 50%" alt="{{Auth::user()->name}}" />
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('site.account')<span class="caret"></span></a>
						<ul class="dropdown-menu">
							@if (Auth::user()->role == 'admin')
							<li><a href="{{route('dashboard')}}">@lang('site.dashboard')</a></li>  
							@endif
							<li><a href="{{route('my_order')}}">@lang('site.my_order')</a></li>  
							<li><a href="{{route('update_profile',Auth::user()->id)}}">@lang('site.settings')</a></li> 
							<li><a href="{{route('logout')}}">@lang('site.logout')</a></li> 
						</ul> 
					</li> 

					<li class="dropdown head-dpdn">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-language"></i> @lang('site.lanuage')<span class="caret"></span></a>
						<ul class="dropdown-menu">
							@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

							<li>
								<a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
									{{ $properties['native'] }}
								</a>
							</li>
						@endforeach					
						</ul> 
					</li>
					
					@if(Auth::user()->role == 'vendor')
					<li class="dropdown head-dpdn">
						<a href="{{route('dashboard_vendor')}}" class="dropdown-toggle {{Request::is('*/user/dashboard_vendor') ? 'active' : ''}}">
							<i class="fa fa-dashboard" aria-hidden="true"></i>@lang('site.dashboard')</a>
					</li>
					@endif 	

					
					<li class="dropdown head-dpdn">
						<a href="{{route('all_products')}}" class="dropdown-toggle {{Request::is('*/user/all_products') ? 'active' : ''}}">
							<i class="fa fa-bookmark" aria-hidden="true"></i>@lang('site.all_products')</a>
					</li>

					<li class="dropdown head-dpdn">
						<a href="{{route('about')}}" class="dropdown-toggle {{Request::is('*/user/about') ? 'active' : ''}}">
							<i class="fa fa-book" aria-hidden="true"></i>@lang('site.About_Us')
						</a>
					</li>



{{-- 
					@foreach (App\Models\Category::get() as $category)
					@if ($category->parent_id == null)
					  @if (App::getLocale() == 'ar')
					   <li class="drop-down"><a href="#"><i class="caret"></i>{{$category->name_ar}}</a>	 
					 @else
					   <li class="drop-down"><a href="#"><i class="caret"></i>{{$category->name_en}}</a>	 
					 @endif
					@endif
				@endforeach --}}


				<li class="dropdown head-dpdn">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i>  @lang('site.categories')<span class="caret"></span></a>
					<ul class="dropdown-menu">

						@foreach (App\Models\Category::get() as $category)
						 @if ($category->parent_id == null) 
						  @if (App::getLocale() == 'ar')
							 <li class="drop-down"><a href="" class="fa fa-angle-down"></i>{{$category->name_ar}}</a>
						  @else
							 <li class="drop-down"><a href="" class="fa fa-angle-down"></i>{{$category->name_en}}</a>
						  @endif
						 @endif

						  <ul>
							  @foreach ($category->childs as $child)
							   @if (App::getLocale() == 'ar')
								  <li><a href="{{route('ProductChilds',$child->id)}}">{{$child->name_ar}}</a></li>														  
							   @else
								  <li><a href="{{route('ProductChilds',$child->id)}}">{{$child->name_en}}</a></li>														  
							   @endif
							  @endforeach
						  </ul>

						  </li>
						@endforeach
					</ul> 
				</li> 


					<li class="dropdown head-dpdn">
						<a href="{{route('index')}}" class="dropdown-toggle {{Request::is('*/user/index') ? 'active' : ''}}">
							<i class="fa fa-home" aria-hidden="true"></i>@lang('site.home_page')
						</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div> 
		</div>
		<div class="header-two"><!-- header-two -->
			<div class="container">
				<div class="header-logo">
					@if (App::getLocale() == 'ar')
					<h1><a href="{{route('index')}}">{{substr($setting->title_ar,0,6)}}<span>{{substr($setting->title_ar,-6)}}</span></a></h1>
					<h6>متجرك مكانك</h6> 
					@else
					<h1><a href="#"><span>{{substr($setting->title_en,0,3)}}</span>{{substr($setting->title_en,-6)}} <i>Bazaar</i></a></h1>Talabatey
					<h6>Your stores. Your place.</h6> 
					@endif
				</div>	
				<div class="header-search">
					<form action="{{route('search_products')}}" method="GET">
						@csrf
						<input type="search" name="search" value="@if (isset($search)){{$search}}
							
						@endif" placeholder="@lang('site.search')">
						<button type="submit" class="btn btn-default" aria-label="Left Align">
							<i class="fa fa-search" aria-hidden="true"> </i>
						</button>
					</form>
				</div>
				<div class="header-cart"> 
					<div class="my-account">
						<a href="{{route('contact_us')}}"><i class="fa fa-map-marker" aria-hidden="true"></i>@lang('site.contact_us')</a>						
					</div>

					<div class="cart">
						@php
						 $count = \Cart::session(Auth::user()->id)->getContent()->count();
						@endphp
						<span class="badge">
							{{$count}}
						</span>
						<button class="w3view-cart last">
							<a href="{{route('index_cart')}}">
							 <i class="fa fa-cart-arrow-down"></i>
							</a>
						</button>
					</div>
					
					<div class="clearfix"> </div> 
				</div> 
				<div class="clearfix"> </div>
			</div>		
		</div><!-- //header-two -->

	</div>
	<!-- //header -->	
    
    @yield('content')
        
	<!-- footer-top -->
	<div class="w3agile-ftr-top" style="margin-bottom: 3%">
		<div class="container">
			<div class="ftr-toprow">
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>@lang('site.FREE_DELIVERY')</h4>
						<p>@lang('site.FREE_DELIVERY_content') </p>
					</div> 
					<div class="clearfix"> </div>
				</div> 
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-user" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>@lang('site.CUSTOMER_CARE')</h4>
						<p>@lang('site.CUSTOMER_CARE_content') </p>
					</div> 
					<div class="clearfix"> </div>
				</div>
				<div class="col-md-4 ftr-top-grids">
					<div class="ftr-top-left">
						<i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
					</div> 
					<div class="ftr-top-right">
						<h4>@lang('site.GOOD_QUALITY')</h4>
						<p>@lang('site.GOOD_QUALITY_content')</p>
					</div>
					<div class="clearfix"> </div>
				</div> 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //footer-top --> 

	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer-info w3-agileits-info">
				<div class="col-md-4 address-left agileinfo">
					<div class="footer-logo header-logo">
						
							@if (App::getLocale() == 'ar')
							<h1><a href="{{route('index')}}"><span>{{substr($setting->title_ar,0,6)}}</span>{{substr($setting->title_ar,-6)}}</a></h1>
							@else
							<h1><a href="#"><span>{{substr($setting->title_en,0,3)}}</span>{{substr($setting->title_en,-6)}} <i>Bazaar</i></a></h1>
							<h6>Your stores. Your place.</h6> 
							@endif
						
					</div>
					<ul>
						<li><i class="fa fa-map-marker"></i> 123 San Sebastian, New York City USA.</li>
						<li><i class="fa fa-phone"></i>{{$setting->phone}}</li>
						<li><i class="fa fa-envelope-o"></i> <a href="mailto:example@mail.com">{{$setting->email}}</a></li>
					</ul> 
				</div>
				<div class="col-md-8">
					<div class="col-md-4 footer-grids">
						<h3>@lang('site.COMPANY')</h3>
						<ul>
							<li><a href="{{route('about')}}">@lang('site.About_Us')</a></li>
							<li><a href="marketplace.html">@lang('site.Marketplace')</a></li>  
							<li><a href="values.html">@lang('site.Core_Values')</a></li>  
							<li><a href="privacy.html">@lang('site.Privacy_Policy')</a></li>
						</ul>
					</div>
					<div class="col-md-4 footer-grids">
						<h3>@lang('site.Services')</h3>
						<ul>
							<li><a href="{{route('contact_us')}}">@lang('site.contuct_as')</a></li>
							<li><a href="login.html">@lang('site.Returns')</a></li> 
							<li><a href="faq.html">@lang('site.FAQ')</a></li>
							<li><a href="sitemap.html">@lang('site.Site_Map')</a></li>
							<li><a href="login.html">@lang('site.Order_Status')</a></li>
						</ul> 
					</div>
					<div class="col-md-4 footer-grids">
						<h3>@lang('site.PAYMENT_METHODS')</h3>
						<ul>
							<li><i class="fa fa-laptop" aria-hidden="true"></i>@lang('site.Net_Banking')</li>
							<li><i class="fa fa-money" aria-hidden="true"></i> @lang('site.Cash_On_Delivery')</li>
							<li><i class="fa fa-pie-chart" aria-hidden="true"></i>@lang('site.EMI_Conversion')</li>
						</ul>  
					</div>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!-- //footer -->		
	<div class="copy-right"> 
		<div class="container">
			<p>© 2016 Smart bazaar . All rights reserved | Design by <a href="http://w3layouts.com"> W3layouts.</a></p>
		</div>
	</div> 
	<!-- cart-js -->
	<script src="{{asset('user_page/js/minicart.js')}}"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) {
        			items[i].set('shipping', 0);
        			items[i].set('shipping2', 0);
        		}
        	}
        });
    </script>  
	<!-- //cart-js -->	
	<!-- countdown.js -->	
	<script src="{{asset('user_page/js/jquery.knob.js')}}"></script>
	<script src="{{asset('user_page/js/jquery.throttle.js')}}"></script>
	<script src="{{asset('user_page/js/jquery.classycountdown.js')}}"></script>
		<script>
			$(document).ready(function() {
				$('#countdown1').ClassyCountdown({
					end: '1388268325',
					now: '1387999995',
					labels: true,
					style: {
						element: "",
						textResponsive: .5,
						days: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#1abc9c",
								lineCap: 'round'
							},
							textCSS: 'font-weight:300; color:#fff;'
						},
						hours: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#05BEF6",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						minutes: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#8e44ad",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						},
						seconds: {
							gauge: {
								thickness: .10,
								bgColor: "rgba(0,0,0,0)",
								fgColor: "#f39c12",
								lineCap: 'round'
							},
							textCSS: ' font-weight:300; color:#fff;'
						}

					},
					onEndCallback: function() {
						console.log("Time out!");
					}
				});
			});
		</script>
	<!-- //countdown.js -->
	<!-- menu js aim -->
	<script src="{{asset('user_page/js/jquery.menu-aim.js')}}"> </script>
	<script src="{{asset('user_page/js/main.js')}}"></script> <!-- Resource jQuery -->
	<!-- //menu js aim --> 
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster --> 
	
</body>
</html>