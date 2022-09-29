@extends('layouts.front')

@section('content')


    <div class="double-gap"></div>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            {{ Breadcrumbs::render('contactus') }}
        </div>
    </div>
    <div class="grid-container" style="position:relative;">
        <div id="p1" class="contact-popup">
            <a class="to_p1">
                @include('icons.phone')
            </a>
            <a class="to_p2">
                @include('icons.comment')
            </a>
        </div>
        <div class="box3 contactus">
                <div class="title">اطلاعات تماس</div>
                <div class="drow">
                    <div class="c-about">
                        <div class="item">
                            <div class="name">
                                @include('icons.location')
                                دفتر مرکزی
                            </div>
                            <div class="value">
                                {{$globalcontact[0]->address}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="name">
                                @include('icons.email')
                                ایمیل
                            </div>
                            <div class="value">
                                {{$globalcontact[0]->email}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="name">
                                @include('icons.phone')
                                شماره های تماس تایم اداری
                            </div>
                            <div class="value">
                                {{$globalcontact[0]->phone1}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="name">
                                @include('icons.mobile')
                                شماره های تماس تایم غیر اداری
                            </div>
                            <div class="value">
                                {{$globalcontact[0]->phone2}}
                            </div>
                        </div>
                        <div class="item">
                            <div class="name">
                                @include('icons.clock')
                                ساعت پاسخ گویی
                            </div>
                            <div class="value">
                                شنبه تا پنج شنبه 24 ساعته
                            </div>
                        </div>
                        <div class="so">
                            <a target="_blank" href="https://t.me/{{$globalcontact[0]->telegram}}">
                                @include('icons.telegram')
                                تلگرام
                            </a>
                            <a target="_blank" href="whatsapp://send?phone=+98{{$globalcontact[0]->whatsapp}}&text=/">
                                @include('icons.whatsApp')
                                واتساپ
                            </a>
                            <a target="_blank" href="https://twitter.com/{{$globalcontact[0]->twitter}}">
                                @include('icons.facebook')
                                توویتر
                            </a>
                            <a target="_blank" href="https://instagram.com/{{$globalcontact[0]->instagram}}">
                                @include('icons.instagram')
                                اینستاگرام
                            </a>
                            <a target="_blank" href="https://facebook.com/{{$globalcontact[0]->facebook}}">
                                @include('icons.facebook')
                                فیسبوک
                            </a>
                        </div>
                    </div>
                    <div class="c-map">
                        <map-page lng="{{$globalcontact[0]->long}}" lat="{{$globalcontact[0]->lat}}" ></map-page>
                    </div>
                </div>
            </div>
    </div>
    <div class="double-gap"></div>
    <div class="double-gap"></div>
    <div class="grid-container" id="p2" style="position:relative;">

        <div class="box3 contactus">
            <div class="title"> فرم تماس با ما</div>
            @include('front.page.contactus.form.main')
        </div>
    </div>

@endsection
