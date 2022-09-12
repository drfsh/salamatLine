@extends('layouts.front')

@section('content')
    <div class="grid-container">
        <div class="double-gap"></div>

        {{ Breadcrumbs::render('category',$data['category']) }}

        <div class="grid-x grid-padding-x">
            <div class="cell medium-3">
                @include('front.category.main.side.main')
            </div>
            <div class="cell medium-9">
                @include('front.category.main.body.main')
            </div>
        </div>
    </div>
@endsection