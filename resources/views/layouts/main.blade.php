<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }} - {{$title}}</title>

    <link rel="shortcut icon" href="/../assets/images/svg/favicon.svg" type="image/x-icon"/>
    <link rel="stylesheet" crossorigin href="/../assets/css/app.css">
    <link rel="stylesheet" crossorigin href="/../assets/css/app-dark.css">

    @yield('style')

</head>

<body>
<div id="app">
    <script src="/../assets/js/initTheme.js"></script>


    @include('layouts.partials.sidebar')

    <div id="main" class="layout-navbar navbar-fixed">

        @include('layouts.partials.header')

        @yield('content')

        @include('layouts.partials.footer')

    </div>

</div>
<script src="/../assets/js/components/dark.js"></script>

<script src="/../assets/js/app.js"></script>

@yield('script')

@include('components.alert')

</body>

</html>
