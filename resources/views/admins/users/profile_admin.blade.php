@extends('admins.layouts.master')

@section('title')
    profile
@endsection

@section('content')
    


<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-xs-12 col-sm-3">
                <div class="card profile-card" style="height: 405px">
                    <div class="profile-header">&nbsp;</div>
                    <div class="profile-body">
                        <div class="image-area">
                            <img src="{{ asset ('images_users/users/'.Auth::user()->image)}}"width="135px" alt="AdminBSB - Profile Image" />
                        </div>
                        <div class="content-area">
                            <h3>{{Auth::user()->name}}</h3>
                            <p>{{Auth::user()->email}}</p>
                            <p>{{Auth::user()->phone}}</p>
                            <p>{{Auth::user()->role}}</p>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-xs-12 col-sm-9">
                <div class="card">
                    <div class="body">
                        <div>
                            <div class="tab-content">

                                <div>
                                    <form class="form-horizontal" method="POST" action="{{ route('update_profile_admin',$users->id) }}" enctype='multipart/form-data'>
                                        @csrf
                                         <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">@lang('site.name')</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{$users->name}}">
                                                    @error('name')
                                                        <small class="alert alert-danger">{{$message}}</small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">@lang('site.email')</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$users->email}}">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">@lang('site.password')</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">@lang('site.phone')</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{$users->phone}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="NameSurname" class="col-sm-2 control-label">@lang('site.image')</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <input type="file" class="form-control" id="image" name="image">
                                                </div>
                                            </div>
                                        </div>

                                        
                                        <div class="form-group">
                                            <label class="col-sm-2 control-label">@lang('site.role')</label>
                                            <div class="col-sm-10">
                                                <div class="form-line">
                                                    <select name="role" class="form-control">
                                                        <option value="admin">Admin</option>
                                                        <option value="Vandor">Vandor</option>
                                                        <option value="user">User</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection