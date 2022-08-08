@extends('layouts.front')

@section('content')
    {{ Breadcrumbs::render('Partner') }}
	<div class="double-gap"></div>
	<div class="grid-container">
        
        @if (Session::has('success'))
            <div class="grid-x grid-padding-x">
                <div class="cell callout success">
                    {{ Session::get('success') }}
                </div>
                <div class="double-gap"></div>
            </div>
        @endif
		
        {!! Form::open(['method' => 'POST', 'route' => ['PartnerRequest']]) !!}
        <div class="box radius mb2 pa2">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-4">
                    {{ Form::label('fullname', 'نام و نام خانوادگی') }}
                    {{ Form::text('fullname', null) }}
                    @if ($errors->has('fullname'))
                        <span class="label warning">
                            <strong>{{ $errors->first('fullname') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="cell medium-4">
                    {{ Form::label('company', 'نام کامل شرکت') }}
                    {{ Form::text('company', null) }}
                    @if ($errors->has('company'))
                        <span class="label warning">
                            <strong>{{ $errors->first('company') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="cell medium-4">
                    {{ Form::label('mobile', 'موبایل') }}
                    {{ Form::text('mobile', null) }}
                    @if ($errors->has('mobile'))
                        <span class="label warning">
                            <strong>{{ $errors->first('mobile') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="cell medium-4">
                    {{ Form::label('phone', 'تلفن') }}
                    {{ Form::text('phone', null) }}
                </div>
                <div class="cell medium-4">
                    {{ Form::label('email', 'ایمیل') }}
                    {{ Form::email('email', null) }}
                </div>
                <div class="cell medium-4">
                    {{ Form::label('web', 'وب‌سایت') }}
                    {{ Form::text('web', null) }}
                </div>
            </div>
        </div>
        <div class="box radius mb2 pa2">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-4">
                    {{ Form::label('country', 'کشور') }}
                    {{ Form::text('country', null) }}
                </div>
                <div class="cell medium-4">
                    {{ Form::label('province', 'استان') }}
                    {{ Form::text('province', null) }}
                </div>
                <div class="cell medium-4">
                    {{ Form::label('city', 'شهر') }}
                    {{ Form::text('city', null) }}
                </div>
                <div class="cell">
                    {{ Form::label('address', 'آدرس کامل') }}
                    {{ Form::textarea('address', null, ['rows' => 2]) }}
                    @if ($errors->has('address'))
                        <span class="label warning">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="box radius mb2 pa2">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-4">
                    {{ Form::label('staff', 'تعداد کارکنان') }}
                    {{ Form::number('staff', null) }}
                    @if ($errors->has('staff'))
                        <span class="label warning">
                            <strong>{{ $errors->first('staff') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="cell medium-4">
                    {{ Form::label('product', 'تعداد محصولات') }}
                    {{ Form::number('product', null) }}
                    @if ($errors->has('product'))
                        <span class="label warning">
                            <strong>{{ $errors->first('product') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="cell">
                    {{ Form::label('productdesc', 'شرح محصولات') }}
                    {{ Form::textarea('productdesc', null, ['rows' => 3, 'placeholder' => 'شرح محصولات یا خدمات']) }}
                </div>
                <div class="cell">
                    {{ Form::label('saledesc', 'شرح میزان فروش') }}
                    {{ Form::textarea('saledesc', null, ['rows' => 3, 'placeholder' => 'در صورت جدید بودن محصول قید فرمایید']) }}
                </div>
                <div class="cell">
                    {{ Form::label('more', 'توضیحات بیشتر') }}
                    {{ Form::textarea('more', null, ['rows' => 3, 'placeholder' => 'در صورت توضیحات بیشتر در مورد محصول یا خدمت ویا تکنولوژی‌ها اینجا بنویسید']) }}
                </div>
            </div>
        </div>
        <div class="box radius mb2 pa2">
            <div class="grid-x grid-padding-x">
                <div class="cell medium-4">
                    {{ Form::label('sale', 'نحوه در اختیارگذاری محصولات') }}
                    {{ Form::select('sale', ['cheque' => 'چکی', 'cash' => 'نقدی', 'trust' => 'امانی'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
                    @if ($errors->has('sale'))
                        <span class="label warning">
                            <strong>{{ $errors->first('sale') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="cell medium-4">
                    {{ Form::label('acquaint', 'نحوه آشنایی با ما') }}
                    {{ Form::select('acquaint', ['social' => 'شبکه‌های اجتماعی', 'search' => 'موتورهای جستجو', 'adv' => 'تبلیغات', 'friend' => 'دوستان و آشنایان', 'other' => 'غیره'], null, ['placeholder' => 'یک گزینه را انتخاب کنید']) }}
                </div>
                <div class="cell">
                    {{ Form::label('reason', 'علت انتخاب ما به عنوان شریک تجاری') }}
                    {{ Form::textarea('reason', null, ['rows' => 2]) }}
                </div>
                <div class="cell">
                    {{ Form::label('expect', 'انتظارات شما از شراکت با ما') }}
                    {{ Form::textarea('expect', null, ['rows' => 2]) }}
                </div>
            </div>
        </div>
        <div class="box radius mb2 pa2 text-center">
            <div class="grid-x grid-padding-x">
                <div class="cell">{{ Form::submit('   ارسال درخواست   ', array('class' => 'button success')) }}
            </div>
        </div>

        {!! Form::close() !!}
		
	</div>
	<div class="double-gap"></div>

@endsection