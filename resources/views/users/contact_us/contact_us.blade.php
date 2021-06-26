@extends('users.layouts.master')


@section('title')
    Contact Us    
@endsection

@section('content')
    
	<!-- contact-page -->
	<div class="contact">
		<div class="container">  
			<div class="contact-form-row">
				<h3 class="w3ls-title w3ls-title1">@lang('site.contact_us')</h3>  
				<div class="col-md-7 contact-left">
                    <form action="{{route('contact_us_store')}}" method="post">
                        @csrf
						<input type="text" name="name" readonly value="{{Auth::user()->name}}">
						<input class="email" type="text" name="emil" readonly value="{{Auth::user()->email}}">
						<textarea placeholder="@lang('site.message')" name="content" required=""></textarea>
						<input type="submit" value="@lang('site.submit')">
					</form>
				</div> 
				<div class="col-md-4 contact-right">
					<div class="cnt-w3agile-row">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-truck" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>@lang('site.Manage_Your_Orders') <br>@lang('site.Easily_Track_Orders_Returns') </p> 
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="cnt-w3agile-row cnt-w3agile-row-mdl">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-bell" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>@lang('site.Notifications') <br>@lang('site.Notifications_content')</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="cnt-w3agile-row">
						<div class="col-md-3 contact-w3icon">
							<i class="fa fa-heart" aria-hidden="true"></i>
						</div>
						<div class="col-md-9 contact-w3text">
							<p>@lang('site.Requirements')<br>@lang('site.Requirements_content')</p> 
						</div>
						<div class="clearfix"> </div>
					</div>
				</div> 
				<div class="clearfix"> </div>	
			</div>
		</div>
	</div>
	<!-- //contact-page --> 

@endsection