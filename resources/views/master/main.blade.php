
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ibis</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/main.js') }}" defer></script>



    <!-- Drag and Drop -->
    <script src="//code.jquery.com/jquery-1.10.2.js" defer></script>
    <script src="//code.jquery.com/ui/1.11.0/jquery-ui.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    @yield('styles')
</head>
<body>
{{--HEADER--}}
@component('master.header')
@endcomponent
{{--END HEADER--}}
<div id="app" class="flex-sm-wrap" style="overflow-x: hidden;">
    <div id="panel" class="flex-sm-wrap">
        {{--        @component('master.side-menu')--}}
        {{--        @endcomponent--}}

        <main class="py-4 main" style="margin-right: 0">
            @yield('content')
        </main>

    </div>
    {{--FOOTER--}}
    @component('master.footer')
    @endcomponent
    {{--END FOOTER--}}
</div>


@include('sweetalert::alert')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
