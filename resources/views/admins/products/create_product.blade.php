@extends('admins.layouts.master')

@section('title')
    Create Product
@endsection

@section('content')


    <section class="content ">
        <div class="container">

            <!-- Basic Validation -->
            <div class="row clearfix">
                <div class="col-lg-10 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>@lang('site.create_product')</h2>
                        </div>
                        <div class="body"style="min-height: 197px;">
                            <form method="POST" action="{{route('create_product_store')}}" enctype='multipart/form-data'>
                                @csrf
                                
                                @if (App::getLocale() == 'ar')
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_ar"  placeholder="@lang('site.name_ar')" 
                                        value="{{ old('name_ar') }}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_en"  placeholder="@lang('site.name_en')" 
                                        value="{{ old('name_en') }}">
                                   
                                        @error('name_en')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                @else

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_ar"  placeholder="@lang('site.name_ar')" 
                                        value="{{ old('name_ar') }}">
                                   
                                        @error('name_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="name_en"  placeholder="@lang('site.name_en')" 
                                        value="{{ old('name_en') }}">
                                   
                                        @error('name_en')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                
                                @endif

                                @if (App::getLocale() == 'ar')

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="content_ar"  cols="30" rows="10" placeholder="@lang('site.content_ar')"></textarea>
                                        @error('content_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="content_en"  cols="30" rows="10" placeholder="@lang('site.content_en')"></textarea>
                                        @error('content_en')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                @else

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="content_ar"  cols="30" rows="10" placeholder="@lang('site.content_ar')"></textarea>
                                        @error('content_ar')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <textarea class="form-control" name="content_en"  cols="30" rows="10" placeholder="@lang('site.content_en')"></textarea>
                                        @error('content_en')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>
        
                                @endif

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="price"  placeholder="@lang('site.price')" 
                                        value="{{ old('price') }}">
                                   
                                        @error('price')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="descount"  placeholder="@lang('site.descount')" 
                                        value="{{ old('descount') }}">
                                   
                                        @error('descount')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="quantity"  placeholder="@lang('site.quantity')" 
                                        value="{{ old('quantity') }}">
                                   
                                        @error('quantity')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                       @enderror
                                    </div>
                                </div>

                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <input type="file" class="form-control" name='image[]' multiple placeholder="Upload Image">
                                        @error('image')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group form-float">
                                    <label>@lang('site.Attributes')</label>
                                    @foreach ($Attributes as $Attribute)
                                    <div class="form-line">
                                        {{-- <label>{{$Attribute->name_en}}</label> --}}
                                        <select aria-hidden="true" name="Attributes[]" class="form-control">
                                            @if (App::getLocale() == 'ar')
                                            <option value="{{$Attribute->id}}">{{$Attribute->name_ar}}</option>
                                            @else
                                            <option value="{{$Attribute->id}}">{{$Attribute->name_en}}</option>
                                            @endif
                                        </select>   
                                        @error('Attributes')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                        @enderror
                                    </div>
    
                                    @if (App::getLocale() == 'ar')
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="value_ar[]"  placeholder="@lang('site.value_ar')" 
                                            value="{{ old('value_ar') }}">
                                       
                                            @error('value_ar')
                                            <h6 class='alert alert-danger'>{{$message}}</h6>
                                           @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="value_en[]"  placeholder="@lang('site.value_en')" 
                                            value="{{ old('value_en') }}">
                                       
                                            @error('value_en')
                                            <h6 class='alert alert-danger'>{{$message}}</h6>
                                           @enderror
                                        </div>
                                    </div>
                                    @else
        
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="value_ar[]"  placeholder="@lang('site.value_ar')" 
                                            value="{{ old('value_ar') }}">
                                       
                                            @error('value_ar')
                                            <h6 class='alert alert-danger'>{{$message}}</h6>
                                           @enderror
                                        </div>
                                    </div>
        
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" class="form-control" name="value_en[]"  placeholder="@lang('site.value_en')" 
                                            value="{{ old('value_en') }}">
                                       
                                            @error('value_en')
                                            <h6 class='alert alert-danger'>{{$message}}</h6>
                                           @enderror
                                        </div>
                                    </div>
                                        
                                    @endif
    
                                    @endforeach
    
                                </div>

                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <label style="color:rgb(104, 100, 100)">@lang('site.brand')</label>
                                        <select name="brand_id" class="form-control">
                                            @foreach ($brands as $brand)
                                             @if (App::getLocale() == 'ar')
                                             <option value="{{$brand->id}}">{{$brand->name_ar}}</option>
                                             @else
                                             <option value="{{$brand->id}}">{{$brand->name_en}}</option>
                                             @endif
                                            @endforeach
                                        </select> 
                                        @error('brand_id')
                                        <h6 class='alert alert-danger'>{{$message}}</h6>
                                        @enderror  
                                    </div>
                                </div>

                                <div class="form-group form-float">

                                    <div class="form-line">
                                        <label style="color:rgb(104, 100, 100)">@lang('site.category')</label>
                                        <select id="category_id" name="category_id" class="form-control">
                                            @foreach ($subcategories as $subcategory)
                                             @if (App::getLocale() == 'ar')
                                             <option value="{{$subcategory->id}}">{{$subcategory->name_ar}}</option>
                                             @else
                                             <option value="{{$subcategory->id}}">{{$subcategory->name_en}}</option>
                                             @endif
                                            @endforeach
                                        </select>   
                                    </div>
                                </div>
                              
                                <button class="btn btn-primary waves-effect" type="submit">@lang('site.button')</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Basic Validation -->

        </div>



    </section>




    

@endsection