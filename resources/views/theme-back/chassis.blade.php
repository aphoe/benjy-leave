<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>{{ config('project.appName') }} - {{ $title ?? config('project.slogan') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="{{ $meta_desc ??  config('project.meta_desc') }}" name="description" />
    <meta content="{{ config('project.appName') }}" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ themeImageUrl('favicon.png') }}">

    <!-- App css -->
    <link href="{{ backCssUrl('bootstrap.min') }}" rel="stylesheet" type="text/css" />
    <link href="{{ backCssUrl('icons.min') }}" rel="stylesheet" type="text/css" />
    <link href="{{ backCssUrl('font-awesome') }}" rel="stylesheet" type="text/css" />
    <link href="{{ backCssUrl('app.min') }}" rel="stylesheet" type="text/css" />
    <link href="{{ backLibCssUrl('sweet-alert2/sweetalert2.min') }}" rel="stylesheet" type="text/css" />
    <link href="{{ themeCssUrl('style') }}" rel="stylesheet" type="text/css" />
    <link href="{{ backCssUrl('custom') }}" rel="stylesheet" type="text/css" />

    @stack('css')

</head>

<body class="{{ $body_class }}">

@yield('chassis')

<form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

<!-- Vendor js -->
<script src="{{ backJsUrl('vendor.min') }}"></script>
<script src="{{ backLibJsUrl('sweet-alert2/sweetalert2.all.min') }}"></script>
{{--<script src="{{ backJsUrl('promise-polyfill') }}"></script>--}}

<!-- App js -->
<script src="{{ backJsUrl('app.min') }}"></script>

<!-- Custom js -->
<script src="{{ backJsUrl('custom') }}"></script>

<script>
    baseUrl = '{{ url('/') }}/';
</script>

@stack('js')

</body>
</html>
