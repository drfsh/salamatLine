@extends('layouts.front')

@section('content')
    <div class="grid-container">
        <div class="double-gap"></div>



        <div class="grid-x grid-padding-x">
            <div class="size">
                {{ Breadcrumbs::render('category',$data['category']) }}
            </div>
            <div class="cell medium-3">
                @include('front.category.main.side.main')
            </div>
            <div class="cell medium-9">
                @include('front.category.main.body.main')
            </div>
        </div>
    </div>
@endsection
