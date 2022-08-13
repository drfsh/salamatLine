<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('front.global.head.main')
</head>
<body>
<div class="off-canvas-wrapper" id="app">
    <div class="content">
        @include('front.global.topbar.main')
        <div class="off-canvas-content" data-off-canvas-content>
            @yield('bread')
            <div class="double-gap"></div>
            <div class="grid-container">
                {{ Breadcrumbs::render(\Request::route()->getName()) }}
                <div class="grid-x grid-padding-x">
                    <div class="cell medium-3 large-3">
                        @include('profile.global.sidebar.main')
                    </div>
                    <div class="cell medium-9 large-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <news-letter/>
</div>
@include('front.global.footer.main')
@include('front.global.js')
</body>
</html>
