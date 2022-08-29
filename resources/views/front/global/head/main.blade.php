<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{-- <meta http-equiv="Content-Security-Policy" content="default-src https:"> --}}
@yield('meta')
{!! SEOMeta::generate() !!}
{!! OpenGraph::generate() !!}
{!! Twitter::generate() !!}
{!! JsonLd::generate() !!}
<link href="{{ mix('/css/front/app.css') }}" rel="stylesheet">
<link href="{{ mix('/css/front/new.css') }}" rel="stylesheet">
@include('front.global.head.favicon')
@include('front.global.head.analytics')

{{--<!-- Google Tag Manager -->--}}
{{--<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':--}}
{{--new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],--}}
{{--j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=--}}
{{--'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);--}}
{{--})(window,document,'script','dataLayer','GTM-PJJLRZT');</script>--}}
{{--<!-- End Google Tag Manager -->--}}



<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-193021352-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-193021352-1');
</script>
