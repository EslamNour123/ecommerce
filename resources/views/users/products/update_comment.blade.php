@extends('users.layouts.master')

@section('title')
   Update Category
@endsection

@section('content')

<section class="content-item" id="comments">
    <div class="container">   
        <div class="row">
            <div class="col-sm-8">   
                <form method='post' action="{{route('update_comment_store',$comment->id)}}">
                    @csrf
                    <h3 class="pull-left">@lang('site.update_comment_view')</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                                <img class="img-responsive" src="{{asset('images_users/users/'.Auth::user()->image)}}" alt="">
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" name='content' id="message" placeholder="@lang('site.write_message')">{{$comment->content}}</textarea>
                                    @error('content')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                    @enderror
                                    <button type="submit" class="btn btn-normal pull-right">@lang('site.send')</button>
                               </form>
                            </div>
                        </div>  	
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection