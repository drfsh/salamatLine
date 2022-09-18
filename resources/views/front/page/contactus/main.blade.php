@extends('layouts.front')

@section('content')


    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            {{ Breadcrumbs::render('contactus') }}
        </div>
    </div>
    <div class="double-gap"></div>
    <div class="grid-container">
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
                            <a>
                                @include('icons.telegram')
                                تلگرام
                            </a>
                            <a>
                                @include('icons.whatsApp')
                                واتساپ
                            </a>
                            <a>
                                @include('icons.facebook')
                                توویتر
                            </a>
                            <a>
                                @include('icons.instagram')
                                اینستاگرام
                            </a>
                            <a>
                                @include('icons.facebook')
                                فیسبوک
                            </a>
                        </div>
                    </div>
                    <div class="c-map">
                        <map-page lng="" lat="" ></map-page>
                    </div>
                </div>
            </div>
    </div>
    <div class="double-gap"></div>

@endsection
