@extends('layouts.admin')
@section('NavItems')
    @include('admin.discount.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell">
            <div class="box shadow rounded hover space">
                <div class="heading">کوپن جدید</div>
                <div class="content">
                    {!! Form::model($coupon, ['route' => ['coupon.update', $coupon->id], 'method' => 'PUT']) !!}
                        <div class="grid-x grid-padding-x">
                            <div class="cell medium-4">
                                <div class="s-card y18">
                                    <i class="far fa-sticky-note"></i>
                                    <div class="title">نکته<br>
                                    <small>ایجاد کوپن به دو روش درصدی و مقداری امکان پذیر است.
                                        در هنگام ایجاد کوپن توجه داشته باشید یکی از دو روش را انتخاب نمایید.(در صورتی که به صورت اشتباه هر دو روش را فعال نمایید اولویت با روش درصدی قرار خواهد گرفت)
                                        در هر دو روش تعریف تاریخ شروع و تاریخ پایان اجباری می‌باشد.
                                        در روش مقداری کوپن تخفیف، تعریف حداقل میزان خرید اجباری می‌باشد.
                                        تعداد حداکثر استفاده در هر دو روش مقداری و درصدی اجباری است.(مگر در صورت استفاده از گزینه‌ی ثابت بدون محدودیت)
                                        در صورتی که گزینه‌ی ثابت بدون محدودیت فعال نمایید، سیستم بدون توجه به تعداد حداکثر استفاده در بازه‌ی زمانیِ انتخاب شده فعال خواهد ماند.</small></div>
                                    <div class="total number"></div>
                                    <div class="bot"></div>
                                </div>

                                <div class="box shadow rounded hover space">
                                    <div class="content">
                                        {{ Form::label('content', 'محتوا') }}
                                        {{ Form::textarea('content', null, ['rows' => 8]) }}
                                    </div>
                                </div>
                            </div>

                            <div class="cell medium-8">
                                <div class="grid-x grid-padding-x">
                                    <div class="cell">
                                        <div class="box shadow rounded hover space">
                                            <div class="heading">
                                                <h4>موارد عمومی</h4>
                                            </div>
                                            <div class="content">
                                                <div class="grid-x grid-padding-x">
                                                    <div class="cell medium-6">
                                                        {{ Form::label('title', 'عنوان') }}
                                                        {{ Form::text('title', null) }}
                                                    </div>
                                                    <div class="cell medium-6">
                                                        {{ Form::label('code', 'کد تخفیف') }}
                                                        {{ Form::text('code', null) }}
                                                        @if ($errors->has('code'))
                                                            <span class="label warning">
                                                                <strong>{{ $errors->first('code') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <div class="cell medium-6">
                                                        {{ Form::label('starts_at', 'شروع') }}
                                                        <input name="starts_at" type="date" value="{{date('Y-m-d', strtotime($coupon->starts_at))}}">
                                                    </div>
                                                    <div class="cell medium-6">
                                                        {{ Form::label('expires_at', 'پایان') }}
                                                        <input name="expires_at" type="date" value="{{date('Y-m-d', strtotime($coupon->expires_at))}}">
                                                    </div>
                                                    <div class="cell">
                                                        {{ Form::label('active', 'فعال') }}
                                                        {{ Form::checkbox('active', null, $coupon->active) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <div class="box shadow rounded hover space">
                                            <div class="heading">
                                                <h4>تعداد استفاده</h4>
                                            </div>
                                            <div class="content">
                                                <div class="grid-x grid-padding-x">
                                                    <div class="cell medium-6">
                                                        {{ Form::label('max_uses', 'حداکثر تعداد استفاده') }}
                                                        {{ Form::text('max_uses', null) }}
                                                    </div>
                                                    <div class="cell medium-6">
                                                        {{ Form::label('is_fixed', 'ثابت بدون محدودیت') }}
                                                        {{ Form::checkbox('is_fixed', null, $coupon->is_fixed) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="cell medium-4">
                                        <div class="box shadow rounded hover space">
                                            <div class="heading">
                                                <h4>روش درصدی</h4>
                                            </div>
                                            <div class="content">
                                                {{ Form::label('discount_percent', 'درصد تخفیف') }}
								                {{ Form::text('discount_percent', null) }}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cell medium-8">
                                        <div class="box shadow rounded hover space">
                                            <div class="heading">
                                                <h4>روش مقداری</h4>
                                            </div>
                                            <div class="content">
                                                <div class="grid-x grid-padding-x">
                                                    <div class="cell medium-6">
                                                        {{ Form::label('price', 'مقدار تخفیف') }}
                                                        {{ Form::text('price', null) }}
                                                    </div>
                                                    <div class="cell medium-6">
                                                        {{ Form::label('min_order', ' حداقل قیمت خرید') }}
                                                        {{ Form::text('min_order', null) }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>

                        </div>
                        <div class="grid-x grid-padding-x">
                            <div class="cell">
                                <div class="double-gap"></div>
                                {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                                <a href="{{ route('discount.index') }}" class="button alert">بازگشت</a>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection