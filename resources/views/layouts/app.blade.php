<!doctype html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title>@yield('title')</title>
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
        <link href="{{ url ('css/style-rtl.css')}}" rel="stylesheet">
        <link href="{{ url ('css/style.css')}}" rel="stylesheet">
    
        <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
        <link href="{{ url ('css/themes/all-themes.css')}}" rel="stylesheet" />
    </head>
<body class="theme-red">
    <div id="app">
        
        
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <a class="navbar-brand" href="#">@lang('site.talabatey')</a>
              </div>
              <ul class="nav navbar-nav navbar-right">
               @guest
               <li><a href="{{ route('login') }}"><span class="glyphicon glyphicon-log-in"></span> @lang('site.login2')</a></li>
               <li><a href="{{ route('register') }}"><span class="glyphicon glyphicon-user"></span>@lang('site.Register')</a></li>
               @endguest
            </ul>
            </div>
          </nav>
        
    

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
