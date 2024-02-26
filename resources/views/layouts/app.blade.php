<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>

    <script src="{{ asset('js/jquery-3.3.1.slim.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/popper.min.js') }}" crossorigin="anonymous"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" crossorigin="anonymous"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/coreui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
       <script src="{{ asset('js/alpinejs.cdn.min.js') }}" defer></script>
    <script src="{{ asset('js/alpinejs.cdn.min.js') }}" defer></script>
    <script src="{{ asset('js/flasher.min.js') }}" defer></script>
      <script src="{{ asset('js/cdn.min.js') }}" defer></script>
    @yield('styles')
    <style>
        @font-face {
        font-family: 'OptimusPrinceps';
    src: url('{{asset('/fonts/NotoNaskhArabic-VariableFont_wght.ttf')}}');
    }
        *{

    font-family: 'OptimusPrinceps';

        }
    </style>
</head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">
    <div class="app flex-row align-items-center">
        <div class="container">
            @yield("content")
        </div>
    </div>

    @yield('scripts')


</body>

</html>
