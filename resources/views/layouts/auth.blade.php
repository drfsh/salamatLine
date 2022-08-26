<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        @include('front.global.head.main')
    </head>
    <body class="auth">
        <div class="off-canvas-wrapper" id="app">
            <div class="grid-container">
                <div class="grid-x align-middle align-center">
                    <div class="cell medium-5 large-3">
                        <a class="logo" href="{{ route('home') }}">
                            @include('front.global.logo')
                        </a>
{{--                        <div class="double-gap"></div>--}}
                    </div>
                    <div class="cell"></div>
                    <div class="cell medium-6 large-4">
                        @yield('content')
                        <div class="back-to-home text-center"><a href="{{ route('home') }}">بازگشت به سلامت لاین</a></div>
                    </div>
                </div>
            </div>
        </div>

        @include('front.global.js')
    </body>
</html>
