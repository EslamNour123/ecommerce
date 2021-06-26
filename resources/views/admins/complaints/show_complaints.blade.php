@extends('admins.layouts.master')

@section('title')
    Details Complaints
@endsection


@section('content')

    <section class="content">
        <div class="container">
            <!-- Basic Card -->
            
            <div class="row clearfix">

                <div style="margin-top: 15%;" class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                              @lang('site.complaints_title')
                            </h2>

                        </div>
                        <div class="body">
                          {{$complaints->content}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
