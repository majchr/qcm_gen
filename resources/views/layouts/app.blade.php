<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
  
</head>
<body>
    <div id="app">
        @guest
                    @include('partials.menuAll')         
                        @else
        @if( Auth::user()->type=='Teacher')
        @include('partials.menuTeacher')
        @else
        @include('partials.menuStudent')
        @endif
        @endguest
        <main class="py-4">
            <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                     @include('partials.flash')
                </div>
            </div>
        </div>

            @yield('content')
        </main>
    </div>
</body>
</html>
