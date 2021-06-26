@extends('layouts.app')


@section('content')
<div style="background:#333;">
    <a style="color:red;" href="{{route('logout')}}">logout</a><br>
<br>    <a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    <br><a style="color:red;" href="{{route('logout')}}">logout</a>
    
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
