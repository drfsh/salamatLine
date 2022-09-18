@extends('layouts.front')

@section('content')
    <div class="double-gap"></div>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            {{ Breadcrumbs::render('singlepage', $page) }}
        </div>
    </div>
    @include('front.page.single.header')
    <div class="double-gap"></div>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            @include('front.page.single.main')
        </div>
    </div>
    <div class="double-gap"></div>

@endsection
