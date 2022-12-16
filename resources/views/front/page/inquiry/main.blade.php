@extends('layouts.front')

@section('content')


    <div class="double-gap"></div>
    <div class="grid-container" id="p2" style="position:relative;">
        <div class="grid-x grid-padding-x">
            <div class="cell medium-7">
                <div class="box3 faq">
                    <div class="list">
                        <div class="title no-line">فروش و استعلام محصولات سلامن لاین</div>
                        <div class="body-inquiry">

                            <p>
                                {!! $text !!}
                            </p>
                            <div class="bot">
                                <div class="text">
                                    محصولات مورد نیاز خود را از ما یخواهید
                                </div>
                                <div>
                                    <img src="/img/page/support-live.webp">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cell medium-5">
                <div class="box3 faq" style="padding: 20px;height: 100%;">
                    <div class="title no-line">اطلاعات خود را جهت تماس و هماهنگی وارد نمایید</div>
                    @include('front.page.inquiry.form.main')
                </div>

            </div>
        </div>
        <div class="c-100">
            <div class="flex-column box-info" style="margin: 30px; 0">
                <div class="item w">
                    <img src="/img/page/{{$data['b1']->img}}">
                    <span>{{$data['b1']->info}}</span>
                </div>
                <div class="item w">
                    <img src="/img/page/{{$data['b2']->img}}">
                    <span>{{$data['b2']->info}}</span>
                </div>
                <div class="item w">
                    <img src="/img/page/{{$data['b3']->img}}">
                    <span>{{$data['b3']->info}}</span>
                </div>
                <div class="item w">
                    <img src="/img/page/{{$data['b4']->img}}">
                    <span>{{$data['b4']->info}}</span>
                </div>
                <div class="item w">
                    <img src="/img/page/{{$data['b5']->img}}">
                    <span>{{$data['b5']->info}}</span>
                </div>
            </div>
        </div>

    </div>

@endsection
