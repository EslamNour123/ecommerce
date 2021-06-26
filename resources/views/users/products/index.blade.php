@extends('users.layouts.master')

@section('title')
    Index Page
@endsection

@section('content')
    
<!-- banner -->
<div class="banner">
    <br>
    @if ($message = Session::get('message'))
    <p class='alert alert-success text-center' style="font-size:18px;">{{$message}}</p>
   @endif
    <div id="kb" class="carousel kb_elastic animate_text kb_wrapper" data-ride="carousel" data-interval="6000" data-pause="hover">
        <!-- Wrapper-for-Slides -->
        <div class="carousel-inner" role="listbox">  
            <div class="item active"> <!-- Second-Slide -->
                <img src="{{asset('user_page/images/8.jpg')}}" alt="new electronics" class="img-responsive" />
                <div class="carousel-caption kb_caption kb_caption_right">
                    <h3 data-animation="animated fadeInDown">@lang('site.Our_Latest_Electronics')</h3>
                </div>
            </div>  
            <div class="item"><!-- First-Slide -->
                <img src="{{asset('user_page/images/13.jpg')}}" alt="shopping" class="img-responsive" />
                <div class="carousel-caption kb_caption kb_caption_right">
                    <h3 data-animation="animated flipInX"> @lang('site.Discount') <span>@lang('site.Exceeding')</span>%50</h3>
                </div>
            </div>  
            <div class="item"><!-- Third-Slide -->
                <img src="{{asset('user_page/images/5.jpg')}}" alt="new electronics2" class="img-responsive"/>
                <div class="carousel-caption kb_caption kb_caption_center">
                </div>
            </div>
        </div> 
        <!-- Left-Button -->
        <a class="left carousel-control kb_control_left" href="#kb" role="button" data-slide="prev">
            <span class="fa fa-angle-left kb_icons" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a> 
        <!-- Right-Button -->
        <a class="right carousel-control kb_control_right" href="#kb" role="button" data-slide="next">
            <span class="fa fa-angle-right kb_icons" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a> 
    </div>
    <script src="{{url('user_page/js/custom.js')}}"></script>
</div>
<!-- //banner -->  
<!-- welcome -->
<div class="welcome"> 
    <div class="container"> 
        <div class="welcome-info">
            <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">

                <h3 class="w3ls-title">@lang('site.featured_products')</h3>
                <br>
                <div class="clearfix"> </div>
                <div id="myTabContent" class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <div class="tabcontent-grids">  
                            <div id="owl-demo" class=""> 

                                @foreach ($products as $product)
                                <div class="item">
                                    <div style="height: 280px;" class="glry-w3agile-grids agileits"> 
                                        @if($image = $product->images[0])
                                         <a href="{{route('details_prodcut',$product->slug)}}" style="height: 92%">                                       
                                           <img src="{{asset('image_product/'.$image->image)}}" width="100%" height= "82%" alt="{{$product->name_en}}">
                                         </a>
                                        @endif                                       
                                         <div class="view-caption agileits-w3layouts">           
                                            @if (App::getLocale() == 'ar')
                                            <h4><a href="products.html">{{$product->name_ar}}</a></h4>
                                            @else
                                            <h4><a href="products.html">{{$product->name_en}}</a></h4>
                                            @endif
                                            {{-- <p>Lorem ipsum dolor sit amet consectetur</p> --}}
                                            <h5>${{$product->price}}</h5>
                                            <form action="{{route('add_cart',$product->id)}}" method="post">
                                                @csrf
                                                <input type="hidden" name="quantity"value="{{$product->quantity}}"/>
                                                <input type="hidden" name="tax" value="{{$product->tax}}"/> 
                                                <input type="hidden" name="product_id" value="{{$product->id}}"/> 
                                                <input type="hidden" name="product_id" value="{{Auth::user()->id}}"/> 
                                                <button type="submit" class="w3ls-cart" >
                                                 <i class="fa fa-cart-plus" aria-hidden="true"></i>
                                                  @lang('site.add_to_card')
                                                </button>
                                            </form>
                                        </div>         
                                    </div>  
                                </div>
                                @endforeach
 
                            </div> 
                        </div>
                    </div>
                </div>   
            </div>  
        </div>  	
    </div>  	
</div> 
<!-- //welcome -->
<!-- coming soon -->
<div class="soon">
    <div class="container">
        <h3>@lang('site.Mega_Deal_Of_the_Week')</h3>
        <h4>@lang('site.Coming_Soon_Dont_Miss_Out')</h4>  
        <div id="countdown1" class="ClassyCountdownDemo"></div>
    </div> 
</div>
<!-- //coming soon -->
<!-- deals -->

{{-- <div class="deals"> 
    <div class="container"> 
        <h3  class="w3ls-title">@lang('site.categories_A')</h3>
        <br>
        <div class="">
            @foreach ($categories as $category)
            <div class="col-md-3 col-sm-12 col-xs-12 focus-grid"> 
                <a href="{{route('category',$category->id)}}" class="wthree-btn wthree3"> 
                    <div class="focus-image">
                        <img src="{{asset('image_categories/'.$category->image)}}" width="100%" height="100%" alt="{{$category->name_en}}">
                    </div>
                    @if (App::getLocale() == 'ar')
                    <h4 class="clrchg">{{$category->name_ar}}</h4>
                    @else
                    <h4 class="clrchg">{{$category->name_en}}</h4>
                    @endif
                </a>
            </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>  	
    </div>  	
</div>  --}}

<div class="deals">
    <div class="container">
        <h3  class="w3ls-title">@lang('site.categories_A')</h3>
        <br>
        <div class="">
            @foreach ($categories as $category)
                <div class="col-md-3 col-sm-12 col-xs-12 focus-grid">
                    <a href="{{route('category',$category->id)}}" class="wthree-btn wthree3">
                        <div class="focus-image">
                            <img src="{{asset('image_categories/'.$category->image)}}" width="100%" height="170px" alt="{{$category->name_en}}">
                        </div>
                        @if (App::getLocale() == 'ar')
                            <h4 class="clrchg">{{$category->name_ar}}</h4>
                        @else
                            <h4 class="clrchg">{{$category->name_en}}</h4>
                        @endif
                    </a>
                </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<!-- //deals --> 


@endsection