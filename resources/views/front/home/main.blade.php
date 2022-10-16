@extends('layouts.front')

@section('content')
    @include('front.home.header.main')
    @include('front.home.icons.icons')
    @include('front.home.banner.baner2')
    @include('front.home.category.main')
    @include('front.home.category.car1')

    @include('front.home.banner.section1')
    @include('front.home.box.main')
    @include('front.home.banner.section2')
    @include('front.home.category.car2')
    @include('front.home.route')
    @include('front.home.banner.section3')

    @include('front.home.country.main')
@endsection
