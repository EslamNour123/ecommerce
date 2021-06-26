@extends('users.layouts.master')

@section('title')
    SubComment
@endsection

@section('content')

<section class="content-item" id="comments">
    <div class="container">   
        <div class="row">
            <div class="col-sm-8">   


                <div class="media">
                    <a class="pull-left"><img class="media-object" src="{{ asset ('images_users/users/'.$comment->user->image)}}" alt="bla bla bla"></a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->user->name}}</h4>
                        <p>{{$comment->content}}</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>{{$comment->created_at}}</li>
                            {{-- <li><i class="fa fa-thumbs-up"></i>13</li> --}}
                        </ul>
                        <ul class="list-unstyled list-inline media-detail pull-right">
                            {{-- <li class=""><a href="">@lang('site.like')</a></li> --}}
                            @if ($comment->user_id == Auth::user()->id)
                            <li class=""><a href="{{route('update_comment',$comment->id)}}">@lang('site.update')</a></li>
                            <li class=""><a href="{{route('delete_comment',$comment->id)}}">@lang('site.delete')</a></li>												
                            @endif											
                        </ul>
                    </div>
                </div>


                <form method='post' action="{{route('create_subcomment',$comment->id)}}">
                    @csrf
                    <h3 class="pull-left">@lang('site.new_comments')</h3>
                    <fieldset>
                        <div class="row">
                            <div class="col-sm-3 col-lg-2 hidden-xs">
                                <img class="img-responsive" src="" alt="">
                            </div>
                            <div class="form-group col-xs-12 col-sm-9 col-lg-10">
                                <textarea class="form-control" name='content' id="message" placeholder="@lang('site.write_message')"></textarea>
                                    @error('content')
                                    <h6 class='alert alert-danger'>{{$message}}</h6>
                                    @enderror                                    
                                    <button type="submit" class="btn btn-normal pull-right">@lang('site.send')</button>
                               </form>
                            </div>
                        </div>  	
                    </fieldset>
                </form>
                <h3>{{$subComments->count()}} :@lang('site.comments')</h3>	
                @if ($subComments->count() >= 1)
                @foreach ($subComments as $subcomment)

                <div class="media">
                    <a class="pull-left" href="#"><img class="media-object" src="{{asset('images_users/users/'.$subcomment->user->image)}}" alt="bla bla bla"></a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$subcomment->user->name}}</h4>
                        <p>{{$subcomment->content}}</p>
                        <ul class="list-unstyled list-inline media-detail pull-left">
                            <li><i class="fa fa-calendar"></i>{{$subcomment->created_at}}</li>
                            {{-- <li><i class="fa fa-thumbs-up"></i>13</li> --}}
                        </ul>
                        <ul class="list-unstyled list-inline media-detail pull-right">
                            {{-- <li class=""><a href="">@lang('site.like')</a></li> --}}
                            @if ($subcomment->user_id == Auth::user()->id)
                            <li class=""><a href="{{route('update_subcomment',$subcomment->id)}}">@lang('site.update')</a></li>
                            <li class=""><a href="{{route('delete_subcomment',$subcomment->id)}}">@lang('site.delete')</a></li>
                            @endif	
                        </ul>
                    </div>
                </div>       

                @endforeach
                @else
                <h3 class="alert alert-success" style="padding:12px;"> @lang('site.no_comment')</h3>
                @endif
        
            </div>
        </div>
    </div>
</section>
<br>
<br>
<br>

@endsection