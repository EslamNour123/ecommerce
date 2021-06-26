@extends('admins.layouts.master')

@section('title')
    Products
@endsection


@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.product_page')
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                         <h2 class="mr-auto">
                            <a style="text-underline-position: under;" href="{{route('create_product')}}">@lang('site.create_product')</a>
                         </h2>

                         
                         <ul class="header-dropdown m-r--5">
                            <form method="GET" action="{{route('index_product')}}" class="form-inline">
                                @csrf
                                <div class="input-group input-group-sm">
                                  <input type="search"name='search'value="{{$search}}" class="form-control form-control-navbar" placeholder="@lang('site.search')" aria-label="Search">
                                </div>
                            </form>
                        </ul>
                         
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            @if ($message = Session::get('message'))
                            <p class='alert alert-success text-center'>{{$message}}</p>
                          @endif
                          <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('site.id')</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.price')</th>
                                    <th>@lang('site.descount')</th>
                                    <th>@lang('site.quantity')</th>
                                    <th>@lang('site.category')</th>
                                    <th>@lang('site.user')</th>
                                    <th>@lang('site.brand')</th>
                                    <th>@lang('site.approve')</th>
                                    <th>@lang('site.featured')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                              <tr>
                                <td>{{$product->id}}</td>
                                @if (App::getLocale() == 'ar')
                                <td>{{substr($product->name_ar,0,15)}}</td>
                                @else
                                <td>{{substr($product->name_en,0,15)}}</td>
                                @endif
                                <td>{{$product->price}}</td>
                                <td>{{$product->descount}}</td>
                                <td>{{$product->quantity}}</td>
                                @if (App::getLocale() == 'ar')
                                <td>{{$product->category->name_ar}}</td>
                                @else
                                <td>{{$product->category->name_en}}</td>
                                @endif
                                <td>{{$product->user->name}}</td>
                                @if (App::getLocale() == 'ar')
                                <td>{{$product->brand->name_ar}}</td>
                                @else
                                <td>{{$product->brand->name_en}}</td>
                                @endif
                                @if($product->approved == false)
                                <td><a style="color:green"href="{{route('approved',$product->id)}}">@lang('site.approved')</a></td>
                                 @else
                                <td><a style="color:red" href="{{route('cansel_product',$product->id)}}">@lang('site.cansel')</a></td>
                                @endif  

                                @if($product->featured == false)
                                <td><a style="color:green"href="{{route('featured',$product->id)}}">@lang('site.on')</a></td>
                                @else
                                <td><a style="color:red" href="{{route('not_featured',$product->id)}}">@lang('site.off')</a></td>
                                @endif
                                
                               <td>  
                                   <a style="font-size:12px;" href="{{route('show_product',$product->slug)}}" class="btn btn-warning">@lang('site.button_show')</a>                                  
                                    @if($product->user_id == Auth::user()->id)
                                    <a style="font-size:12px;" href="{{route('update_product',$product->id)}}" class="btn btn-info">@lang('site.button_update')</a>
                                    @endif
                                   <a href="{{route('delete_product',$product->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                               </td>
                              </tr>                               
                                 @endforeach
                            </tbody>
                        </table>
                           
                            <div class="d-flex justify-content-center text-center">
                                <small>{{$products->links()}}</small> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection