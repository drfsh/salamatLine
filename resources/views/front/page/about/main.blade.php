@extends('layouts.front')

@section('content')


    <div class="double-gap"></div>
    <div class="double-gap"></div>

    <div class="grid-container" style="position:relative;">
        <div class="box3 about">
            <div class="title">
                @include('icons.shop')
                <span style="margin: 0 15px;">/</span>
                <span>درباره ما</span>
            </div>

            <div class="row" style="margin-top: 30px;">

                @include('front.page.about.part.section1')
                @include('front.page.about.part.section2')
                @include('front.page.about.part.section3')
                @include('front.page.about.part.section4')
                <div class="double-gap"></div>
                <div class="double-gap"></div>

            </div>
        </div>
    </div>


@endsection
