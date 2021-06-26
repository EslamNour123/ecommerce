<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title> @yield('title') </title>
        <!-- Favicon-->
        <link rel="icon" href="{{ url ('favicon.ico')}}" type="image/x-icon">
    
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    
        <!-- Bootstrap Core Css -->
        <link href="{{ url ('plugins/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    
        <!-- Waves Effect Css -->
        <link href="{{ url ('plugins/node-waves/waves.css')}}" rel="stylesheet" />
    
        <!-- Animation Css -->
        <link href="{{ url ('plugins/animate-css/animate.css')}}" rel="stylesheet" />
    
        <!-- Morris Chart Css-->
        <link href="{{ url ('plugins/morrisjs/morris.css')}}" rel="stylesheet" />
    
        <!-- Custom Css -->
        {{-- <link href="{{ url ('css/style-rtl.css')}}" rel="stylesheet"> --}}
        <link href="{{ url ('css/style.css')}}" rel="stylesheet">
    
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{ url ('css/themes/all-themes.css')}}" rel="stylesheet" />
        <!-- Custom Css -->
        @if(App::getLocale() == 'ar')
        <link href="{{ url ('css/style-rtl.css')}}" rel="stylesheet">
        @else
        <link href="{{ url ('css/style.css')}}" rel="stylesheet">
        @endif
        
    </head>
    
    
<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->

    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#">@lang('navbar.ecommerce')</a>
            </div>
        </div>
    </nav>

    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            @if (Auth::user()->role == 'admin')
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset ('images_users/users/'.Auth::user()->image)}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name"><a style="color:#fff;" href="{{route('profile_admin')}}">{{Auth::user()->name}}</a></div>
                    <div style="color:#fff;" class="email">{{Auth::user()->email}}</div>
                </div>
            </div>
            @else
            <div class="user-info">
                <div class="image">
                    <img src="{{ asset ('images_users/users/'.Auth::user()->image)}}" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name"><a style="color:#fff;" href="{{route('update_profile',Auth::user()->id)}}">{{Auth::user()->name}}</a></div>
                    <div class="email">{{Auth::user()->email}}</div>
                </div>
            </div>
            @endif
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    @if(Auth::user()->role == 'admin')
            
                    <li class="header">@lang('site.pages')</li>
                    <li class="{{Request::is('*/admin/dashboard') ? 'active' : ''}}">
                        <a href="{{route('dashboard')}}">
                            <i class='material-icons'>home</i>
                            <span>@lang('site.dashboard')</span>
                        </a>
                    </li>
                    {{-- {{route('index')}} --}}
                    <li class="">
                        <a href="{{route('index')}}">
                            <i class='material-icons'>swap_calls</i>
                            <span>@lang('site.page')</span>
                        </a>
                    </li>

                    <li class="{{Request::is('*/admin/index_brand') ? 'active' : ''}}">
                        <a href="{{route('index_brand')}}">
                            <i class='material-icons'>text_fields</i>
                            <span>@lang('site.brand')</span>
                        </a>
                    </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">                            
                <i class="material-icons">face</i>
                <span>@lang('site.user_page')</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a class="{{Request::is('*/admin/index_user') ? 'active' : ''}}"href="{{route('index_user')}}">@lang('site.users')</a>
                    </li>
                </ul>
            </li>

                
                <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                    <i class="material-icons">category</i>
                    <span>@lang('site.category')</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a class="{{Request::is('*/admin/index_category') ? 'active' : ''}}" href="{{route('index_category')}}">@lang('site.genral_category')</a>
                    </li>

                    {{-- <li>
                        <a class="{{Request::is('*/admin/detalis_category') ? 'active' : ''}}" href="{{route('detalis_category')}}">@lang('site.details_category')</a>
                    </li> --}}
                
                </ul>
            </li>

            <li>
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class='material-icons'>bookmarks</i>
                    <span>@lang('site.product_page')</span>
                </a>
                <ul class="ml-menu">
                    <li>
                        <a class="{{Request::is('*/admin/index_product') ? 'active' : ''}}" href="{{route('index_product')}}">@lang('site.product_page')</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class='material-icons'>playlist_add</i>
                <span>@lang('site.attributes_products')</span>
            </a>
            <ul class="ml-menu">
                <li>
                    <a class="{{Request::is('*/admin/index_attribute') ? 'active' : ''}}" href="{{route('index_attribute')}}">@lang('site.attibutes')</a>
                </li>
            </ul>
        </li>

            


            <li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class='material-icons'>list</i>
                    <span>@lang('site.order_page')</span>
                </a>
            <ul class="ml-menu">
                <li>
                    <a class="{{Request::is('*/admin/index_orders') ? 'active' : ''}}" href="{{route('index_orders')}}">@lang('site.order_page')</a>
                </li>

                <li>
                    <a class="" href="">@lang('site.orders_done')</a>
                </li>
            </ul>
          </li>

            <li class="{{Request::is('*/admin/index_comments') ? 'active' : ''}}">
                <a href="{{route('index_comments')}}">
                    <i class='material-icons'>comment</i>
                    <span>@lang('site.comments')</span>
                </a>
            </li>

            <li class="{{Request::is('*/admin/index_ratings') ? 'active' : ''}}">
                <a href="{{route('index_ratings')}}">
                    <i class='material-icons'>star</i>
                    <span>@lang('site.ratings')</span>
                </a>
            </li>
            
            <li class="{{Request::is('*/admin/index_complaints') ? 'active' : ''}}">
                <a href="{{route('index_complaints')}}">
                    <i class='material-icons'>call</i>
                    <span>@lang('site.complaints')</span>
                </a>
            </li>
            

            <li>
                <a href="javascript:void(0);" class="menu-toggle">                            
                    <i class="material-icons">language</i>
                    <span>@lang('site.lanuage')</span>
                </a>
                <ul class="ml-menu">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>

            <li class="{{Request::is('*/admin/index_settings') ? 'active' : ''}}">
                <a href="{{route('index_settings')}}">
                    <i class='material-icons'>settings</i>
                    <span>@lang('site.settings')</span>
                </a>
            </li>

        @endif

        @if(Auth::user()->role == 'vendor')
            
        <li>
            <a href="javascript:void(0);" class="menu-toggle">
                <i class='material-icons'>bookmarks</i>
            <span>@lang('site.product_page')</span>
        </a>
        <ul class="ml-menu">
            <li class="{{Request::is('*/user/dashboard_vendor') ? 'active' : ''}}">
                <a href="{{route('dashboard_vendor')}}">@lang('site.product_page')</a>
            </li>

            <li class="{{Request::is('*/user/waite_product_list') ? 'active' : ''}}">
                <a href="{{route('waite_product_list')}}">@lang('site.waite_list')</a>
            </li>

            <li class="{{Request::is('*/user/index_orders_vendor') ? 'active' : ''}}">
                <a href="{{route('index_orders_vendor')}}">@lang('site.order_page')</a>
            </li>
         </ul>
        </li>

        <li class="">
            <a href="{{route('index')}}">
                <i class='material-icons'>flage</i>
                <span>@lang('site.page')</span>
            </a>
        </li>

        <li>
            <a href="javascript:void(0);" class="menu-toggle">                            
                <i class="material-icons">language</i>
                <span>@lang('site.lanuage')</span>
            </a>
            <ul class="ml-menu">
                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)

                    <li>
                        <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>

        @endif
        
            <li class="">
                <a href="{{route('logout')}}">
                    <i class='material-icons'>logout</i>
                    <span>@lang('site.logout')</span>
                </a>
            </li>

                    
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

    <section style="margin-top:100px">
        @yield('content')
    </section>

    <!-- Jquery Core Js -->
    <script src="{{ url ('plugins/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core Js -->
    <script src="{{ url ('plugins/bootstrap/js/bootstrap.js')}}"></script>

    <!-- Select Plugin Js -->

    <!-- Slimscroll Plugin Js -->
    <script src="{{ url ('plugins/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="{{ url ('plugins/node-waves/waves.js')}}"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ url ('plugins/jquery-countto/jquery.countTo.js')}}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ url ('plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{ url ('plugins/morrisjs/morris.js')}}"></script>

    <!-- ChartJs -->
    <script src="{{ url ('plugins/chartjs/Chart.bundle.js')}}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ url ('plugins/flot-charts/jquery.flot.js')}}"></script>
    <script src="{{ url ('plugins/flot-charts/jquery.flot.resize.js')}}"></script>
    <script src="{{ url ('plugins/flot-charts/jquery.flot.pie.js')}}"></script>
    <script src="{{ url ('plugins/flot-charts/jquery.flot.categories.js')}}"></script>
    <script src="{{ url ('plugins/flot-charts/jquery.flot.time.js')}}"></script>


    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ url ('plugins/jquery-sparkline/jquery.sparkline.js')}}"></script>

    <!-- Custom Js -->
    <script src="{{ url ('js/admin.js')}}"></script>
    <script src="{{ url ('js/pages/index.js')}}"></script>

    <!-- Demo Js -->
    <script src="{{ url ('js/demo.js')}}"></script>
</html>
