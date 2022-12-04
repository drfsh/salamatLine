@extends('layouts.front')

@section('content')

    <div class="double-gap"></div>
    {{--        {{ Breadcrumbs::render('collection',$data['collection']) }}--}}

    @include('front.collection.main.banner')
    @include('front.collection.main.banner0')
    @include('front.collection.main.product1')
    @include('front.collection.main.banner2')
    @include('front.collection.main.product2')
    @include('front.collection.main.banner3')
    @include('front.collection.main.product3')

    <div class="double-gap"></div>
@endsection