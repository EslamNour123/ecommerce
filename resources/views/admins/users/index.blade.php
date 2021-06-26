@extends('admins.layouts.master')

@section('title')
    Index User
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <!-- Basic Examples -->
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    
                    <div class="block-header">
                        @if ($message = Session::get('message'))
                          <p class='alert alert-success text-center'>{{$message}}</p>
                        @endif
                        <h2>
                            @lang('site.user_table')
                        </h2>
                    </div>

                    <div class="header">

                         <h2 class="mr-auto">
                            <a style="text-underline-position: under;" href="{{route('create_user')}}">@lang('site.create_user')</a>
                         </h2>

                         
                         <ul class="header-dropdown m-r--5">
                            <form method="GET" action="{{route('index_user')}}" class="form-inline">
                                @csrf
                                <div class="input-group input-group-sm">
                                  <input type="search"name='search'value="{{$search}}" class="form-control form-control-navbar" placeholder="@lang('site.search')" aria-label="Search">
                                </div>
                            </form>
                        </ul>
                    </div>
                    @if ($users->isNotEmpty())

                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>@lang('site.id')</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.email')</th>
                                        <th>@lang('site.phone')</th>
                                        <th>@lang('site.image')</th>
                                        <th>@lang('site.role')</th>
                                        <th>@lang('site.block')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->phone}}</td>
                                        <td>
                                            <img src="{{asset('images_users/users/'.$user->image)}}" height='45px' width="80px" alt="">
                                        </td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->block}}</td>
                                        <td>
                                            <a href="{{route('update_user',$user->id)}}" class="btn btn-info">@lang('site.button_update')</a>
                                            <a href="{{route('delete_user',$user->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                        </td>
                                     </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-center text-center">
                                <small>{{$users->links()}}</small> 
                            </div>
                        </div>
                    </div>

                    @else
                    
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>@lang('site.id')</th>
                                        <th>@lang('site.name')</th>
                                        <th>@lang('site.email')</th>
                                        <th>@lang('site.phone')</th>
                                        <th>@lang('site.image')</th>
                                        <th>@lang('site.role')</th>
                                        <th>@lang('site.block')</th>
                                        <th>@lang('site.action')</th>
                                    </tr>
                                </thead>
                            </table>
                            <div class="d-flex justify-content-center text-center">
                                <small>{{$users->links()}}</small> 
                            </div>
                        </div>
                    </div>
                        
                    @endif
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection