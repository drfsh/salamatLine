@extends('layouts.front')

@section('content')


    <div class="double-gap"></div>
    <div class="double-gap"></div>

    <div class="grid-container" style="position:relative;">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-7" style="margin-bottom:20px;">
                <div class="box3 faq">
                    <div class="list">
                        @foreach($list as $item)
                            <div class="item" >
                                <div class="title" role="button">{{$item->title}}
                                <i class="fas fa-plus"></i>
                                </div>
                                <p class="answer">{{$item->body}}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="cell medium-5" style="margin-bottom: 20px;">
                <div class="box3 faq" style="padding: 20px;">
                    <div class="title" style="font-weight: 700;font-size: 19px;">سوال دیگری دارید؟</div>
                    <div class="body">
                        @include('front.page.faq.form.main')
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
