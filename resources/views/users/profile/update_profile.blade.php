@extends('users.layouts.master')

@section('title')
    Update Profile
@endsection

@section('content')

	<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">@lang('site.update_profile')</h3>  
			<div class="login-body">
				<form action="{{route('settings',$users->id)}}" method="post" enctype='multipart/form-data'>
                    @csrf
                    <input type="text"  name="name" value="{{$users->name}}" placeholder="@lang('site.name')">
                    @error('name')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror
                    
                    <input type="text"name="email" value="{{$users->email}}" placeholder="@lang('site.email')">
                    @error('email')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror

                    <input type="password" name="password" placeholder="@lang('site.password')">
                    @error('password')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror

                    <input type="text" name="phone" value="{{$users->phone}}" placeholder="@lang('site.phone')">
                    @error('phone')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror

                    <input type="file" name="image">
                    @error('image')
                    <h6 class='alert alert-danger'>{{$message}}</h6>
                    @enderror

                    <input type="submit" value="@lang('site.submit')">
				</form>
			</div>  
		</div>
	</div>
	<!-- //login-page --> 

@endsection