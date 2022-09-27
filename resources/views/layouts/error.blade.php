<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('front.global.head.main')
</head>
<body class="white h-100">
<div class="off-canvas-wrapper h-100" id="app">
    <div class="grid-container h-100" style="display: flex;align-items: center;justify-content: center;height: 93%;">
        @yield('content')
    </div>
</div>

@include('front.global.js')
</body>
</html>
