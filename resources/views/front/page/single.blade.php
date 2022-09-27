@extends('layouts.front')

@section('content')
    <div class="double-gap"></div>

    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            {{ Breadcrumbs::render('singlepage', $page) }}
        </div>
    </div>
    {{--    @include('front.page.single.header')--}}
    <div class="grid-container">
        @include('front.page.single.main')
    </div>
    <div class="double-gap"></div>

@endsection
