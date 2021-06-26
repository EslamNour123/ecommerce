@extends('users.layouts.master')

@section('title')
    Create Order
@endsection

@section('content')

	<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">@lang('site.add_order')</h3>  
			<div class="login-body">
				<form action="{{route('add_order_store')}}" method="post">
                    @csrf
                    <input type="text"  name="city" value="" placeholder="@lang('site.city')">
                    @error('name')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror
                    
                    <textarea class="form-control" name="address"  cols="30" rows="10" placeholder="@lang('site.address')"></textarea>
                    @error('address')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror

                    <input type="submit" value="@lang('site.send')">
				</form>
			</div>  
		</div>
	</div>
	<!-- //login-page --> 

@endsection