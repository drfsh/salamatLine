@extends('layouts.error')
@section('content')

    <div class="size invoice" style="max-width: 29.7cm;">
        <div class="title">
            @include('icons.print')
        </div>
        <div class="top">
            <div class="logo">
                @include('front.global.topbar.desktop.top.logo')
            </div>
            <div class="code val">
                <span class="t">شماره فاکتور : </span>
                <span class="d">{{$invoice->id}}</span>

                <span class="t">تاریخ فاکتور : </span>
                <span class="d">{{$invoice->date_n}}</span>
            </div>
        </div>

        <div>
            <div class="sell">
                <div class="title">
                    <span>فروشنده</span>
                </div>
                <div class="c w-100">
                    <div class="c">
                        <div class="text">
                            <span>نام:</span>
                            <span>فروشگاه اینترنتی سلامت لاین</span>
                        </div>
                        <div class="text">
                            <span>آدرس:</span>
                            <span>تهران، خیابان ولیعصر، بالاتر از جامی، پلاک ۱۰۷۰</span>
                        </div>
                    </div>

                    <div class="c">
                        <div class="text">
                            <span>کدپستی:</span>
                            <span>۱۲۳۴۵۶۷۸</span>
                        </div>
                        <div class="text">
                            <span>شماره تماس:</span>
                            <span>021-66462985</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sell" style="height: 67px;">
                <div class="title">
                    <span>خریدار</span>
                </div>
                <div class="c w-100">
                    <div>
                        <div class="c">
                            <div class="text">
                                <span>نام:</span>
                                <span>{{$invoice->address->name . ' ' . $invoice->address->lname}}</span>
                            </div>
                            <div class="text">
                                <span>شرکت:</span>
                                <span>{{$invoice->address->company}}</span>
                            </div>
                        </div>
                        <div style="margin-top: 8px;" class="text">
                            <span>آدرس:</span>
                            <span>{{$invoice->client_address}}</span>
                        </div>
                    </div>

                    <div class="c">
                        <div class="text">
                            <span>شماره تماس:</span>
                            <span>{{$invoice->address->mobile}}</span>
                        </div>
                        <div class="text">
                            <span>ایمیل:</span>
                            <span>{{$invoice->address->email}}</span>
                        </div>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>شناسه</th>
                        <th>محصولات</th>
                        <th>قیمت واحد</th>
                        <th>تعداد</th>
                        <th>میزان تخفیف</th>
                        <th>جمع کل</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <th>SL-5226</th>
                    <th>SL-5226</th>
                    <th>250,000 تومان</th>
                    <th>1</th>
                    <th>0 تومان</th>
                    <th>250,000 تومان</th>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

@endsection