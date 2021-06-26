@extends('admins.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="block-header">
            <h2>
                @lang('site.waite_list_prodcut')
            </h2>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                         
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
                                    <th>@lang('site.content')</th> 
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.price')</th>
                                    <th>@lang('site.descount')</th>
                                    <th>@lang('site.quantity')</th>
                                    <th>@lang('site.category')</th>
                                    <th>@lang('site.user')</th>
                                    <th>@lang('site.brand')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                    
                                @foreach ($products as $product)
                                 <tr>
                                    <td>{{$product->id}}</td>
                                    @if (App::getLocale() == 'ar')
                                    <td>{{substr($product->name_ar,0,30)}}</td>
                                    @else
                                    <td>{{substr($product->name_en,0,30)}}</td>
                                    @endif
                                    @if (App::getLocale() == 'ar')
                                    <td>{{substr($product->content_ar,0,30)}}</td>
                                    @else
                                    <td>{{substr($product->content_en,0,30)}}</td>
                                    @endif
                                    <td>
                                        @if($image = $product->images->first())
                                        <img src="{{asset('image_product/'.$image->image)}}" height='45px' width="80px" alt="">
                                        @endif
                                        
                                    </td>
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
                                    <td>  
                                        <a href="{{route('delete_product_vendor',$product->id)}}" class="btn btn-danger">@lang('site.button_delete')</a>
                                    </td>
                                  </tr> 
                                  @endforeach   
                            </tbody>
                        </table>
                           
                            {{-- <div class="d-flex justify-content-center text-center">
                                <small>{{$categories->links()}}</small> 
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #END# Basic Examples -->

    </div>
</section>


@endsection

