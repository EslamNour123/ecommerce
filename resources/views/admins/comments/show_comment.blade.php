
@extends('admins.layouts.master')

@section('title')
    Details Comments
@endsection


@section('content')

    <section class="content">
        {{--<div class="container">--}}
            {{--<!-- Basic Card -->--}}
            {{----}}
            {{--<div class="row clearfix">--}}

                {{--<div style="margin-top: 10px;" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">--}}
                    {{--<div class="card">--}}
                        {{--<div class="card-header">--}}
                            {{--<h2>--}}
                              {{--@lang('site.comment_title')--}}
                            {{--</h2>--}}

                        {{--</div>--}}
                        {{--<div class="card-body">--}}
                          {{--{{$comments->content}}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}

            {{--</div>--}}
        {{--</div>--}}
        <h2>@lang('site.comment_title')</h2>
        <div class="comment_box" style="margin-top:4%;margin-left: 2%;">
             <img src="{{ asset ('images_users/users/'.Auth::user()->image)}}" alt="avatar"width="6%" height="10%"> 
            <div class="inside_comment">
                <div class="comment-meta">
                    <div class="commentsuser">{{$comments->user->name}}</div>
                    <div class="comment_date">{{$comments->created_at}}</div>
                </div>
            </div>
            <div class="comment-body">
                <p>{{$comments->content}}</p>
            </div>
        </div>
    </section>

@endsection


