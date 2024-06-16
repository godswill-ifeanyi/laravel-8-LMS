<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
 
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <meta name="description" content="@yield('meta_description')">
    <meta name="keyword" content="@yield('meta_keyword')">
    <meta name="author" content="Godswill Ifeanyi">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link name="favicon" type="image/x-icon" href="{{asset('front_assets/uploads/system/favicon.png')}}"  rel="shortcut icon">
    <link rel="favicon" href="{{asset('front_assets/assets/frontend/default/img/icons/favicon.ico')}}">
    <link rel="apple-touch-icon" href="{{asset('front_assets/assets/frontend/default/img/icons/icon.png')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/jquery.webui-popover.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/slick-theme.css')}}">
    <!-- font awesome 5 -->
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/fontawesome-all.min.css')}}">

    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/frontend/default/css/responsive.css')}}">
    <link href="{{asset('front_assets/css?family=Open+Sans:300,400,400i,600,700" rel="stylesheet')}}">
    <link rel="stylesheet" href="{{asset('front_assets/assets/global/toastr/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('front_assets/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css')}}">


    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!--Favicon-->
    {{-- @php
        $setting = App\Models\Setting::find(1);
    @endphp
    @if ($setting)
    <link rel="shortcut icon" href="{{asset('uploads/setting/'.$setting->favicon)}}">
    @endif --}}

</head>
<body class="gray-bg">
    <section class="menu-area">
        <div class="container-xl">
          <div class="row">
            <div class="col">
            @include('layouts.includes.front-navbar')  
            </div>
          </div>
        </div>
  </section>

    @yield('content')

    @include('layouts.includes.front-footer')

    <script src="{{asset('front_assets/assets/frontend/default/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/vendor/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/popper.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/slick.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/select2.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/tinymce.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/multi-step-modal.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/jquery.webui-popover.min.js')}}"></script>
    <script src="{{asset('front_assets/libraries/O7BMTay5.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/main.js')}}"></script>
    <script src="{{asset('front_assets/assets/global/toastr/toastr.min.js')}}"></script>
    <script src="{{asset('front_assets/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js')}}" charset="utf-8"></script>
    <script src="{{asset('front_assets/ajax/libs/jquery.form/4.2.2/jquery.form.min.js')}}" integrity="sha384-FzT3vTVGXqf7wRfy8k4BiyzvbNfeYjK+frTVqZeNDFl8woCbF0CYG6g2fMEFFo/i" crossorigin="anonymous"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/bootstrap-tagsinput.min.js')}}"></script>
    <script src="{{asset('front_assets/assets/frontend/default/js/custom.js')}}"></script>    
    
    <!--Alertify JavaScript -->
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    @if (session('status'))
        <script>
            alertify.set('notifier','position', 'top-right');
            alertify.success('{{session('status')}}');
        </script>
    @endif

    @yield('script')
</body>
</html>
