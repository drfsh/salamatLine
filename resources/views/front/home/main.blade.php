@extends('layouts.front')

@section('content')
    	@include('front.home.header.main')
    {{--    @include('front.home.icons.icons')--}}
        @include('front.home.banner.baner2')
    {{--    @include('front.home.category.main')--}}
        @include('front.home.category.car1')

{{--    	@include('front.home.featured.main')--}}
        @include('front.home.banner.section1')
        @include('front.home.box.main')
{{--        @include('front.home.banner.section2')--}}
{{--        @include('front.home.category.car2')--}}
{{--        @include('front.home.route')--}}
{{--        @include('front.home.banner.section3')--}}
    {{--    @include('front.home.blog.main')--}}
    {{--	@include('front.home.cat')--}}
    {{--	@include('front.home.latest')--}}
    @include('front.home.country.main')
@endsection
