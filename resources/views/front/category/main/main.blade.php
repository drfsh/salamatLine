@extends('layouts.front')

@section('content')
    <div class="grid-container">
        <div class="double-gap"></div>


        <div class="grid-x grid-padding-x">
            <div class="size">
                {{ Breadcrumbs::render('category',$category) }}
            </div>
        </div>
        <script>
            window.whatsApp = {{$globalcontact[0]->whatsapp}}
                window.telegram = {{$globalcontact[0]->telegram}}
                window.cat_name = "{{$category->name}}"
                window.cat_id = {{$cat_id}}
        </script>
        <div id="category" class="grid-x grid-padding-x"></div>
        {{--            <div class="cell medium-3">--}}
        {{--                @include('front.category.main.side.main')--}}
        {{--            </div>--}}
        {{--            <div class="cell medium-9">--}}
        {{--                @include('front.category.main.body.main')--}}
        {{--            </div>--}}
    </div>
@endsection
