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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d810.0981830184171!2d51.403563706773845!3d35.69195202476301!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0109e6bb2745%3A0x7e7500dd41ba395f!2sSalamatLine!5e0!3m2!1sfa!2s!4v1664528232430!5m2!1sfa!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
