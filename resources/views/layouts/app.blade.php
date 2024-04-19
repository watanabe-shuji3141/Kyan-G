<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->
    <title>Kyan-G</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
    <script src="{{ asset('/assets/dist/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('/assets/dist/js/animsition.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/assets/dist/css/animsition.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/assets/dist/css/bootstrap.min.css') }}"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/assets/css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/base.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('/assets/css/nav.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('/assets/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/slick/slick.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
    <!-- アニメーション表示する場合 -->
    <!-- <div class="animsition"> -->
    <div>
        <div id="app">
            <main class="">
                {{-- <div class=""> --}}
                    @if ($errors->any())
                        <ul id = "error" class="error alert alert-danger">
                            @foreach ($errors->all() as $error)
                            
                                <li>{{ $error }}</li>
                            
                            @endforeach
                        </ul>
                    @endif
                {{-- </div> --}}
                {{-- <div> --}}
                    @if (isset($success))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ $success }}</li>
                            </ul>
                        </div>
                    @endif
                {{-- </div> --}}
                @yield('nav')
                @yield('content')
            </main>
        </div>
        <!-- <footer>
            footer
        </footer> -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <!-- <script src="{{ asset('/assets/dist/js/bootstrap.min.js') }}"></script> -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('/assets/slick/slick.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/assets/js/base.js') }}"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        @yield('js')
    </div>
</body>
</html>