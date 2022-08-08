@extends('layouts.profile')


@section('content')

<div class="double-gap"></div>
<div class="grid-x grid-padding-x">
    <div class="cell medium-8 medium-offset-2">

        {!! Form::model($survey, ['route' => ['FillSurvey', $survey->invoice_id], 'method' => 'PUT']) !!}
            <fieldset class="fieldset">
                @if ($errors->has('quality'))
                    <span class="label warning">
                        <strong>{{ $errors->first('quality') }}</strong>
                    </span>
                @endif
                {{ Form::label('quality', 'کیفیت محصولات را در چه سطحی می‌بینید؟ (به ترتیب 1 ضعیف و 5 عالی)') }}
                {{ Form::radio('quality', 1) }}
                {{ Form::label('quality', '1') }}
                {{ Form::radio('quality', 2) }}
                {{ Form::label('quality', '2') }}
                {{ Form::radio('quality', 3) }}
                {{ Form::label('quality', '3') }}
                {{ Form::radio('quality', 4) }}
                {{ Form::label('quality', '4') }}
                {{ Form::radio('quality', 5) }}
                {{ Form::label('quality', '5') }}
            </fieldset>

            <fieldset class="fieldset">
                @if ($errors->has('price'))
                    <span class="label warning">
                        <strong>{{ $errors->first('price') }}</strong>
                    </span>
                @endif
                {{ Form::label('price', 'قیمت اجناس را چگونه ارزیابی می‌کنید؟ (به ترتیب 1 ضعیف و 5 عالی)') }}
                {{ Form::radio('price', 1) }}
                {{ Form::label('price', '1') }}
                {{ Form::radio('price', 2) }}
                {{ Form::label('price', '2') }}
                {{ Form::radio('price', 3) }}
                {{ Form::label('price', '3') }}
                {{ Form::radio('price', 4) }}
                {{ Form::label('price', '4') }}
                {{ Form::radio('price', 5) }}
                {{ Form::label('price', '5') }}
            </fieldset>

            <fieldset class="fieldset">
                @if ($errors->has('transport'))
                    <span class="label warning">
                        <strong>{{ $errors->first('transport') }}</strong>
                    </span>
                @endif
                {{ Form::label('transport', 'نمره شما به نحوه ارسال (به ترتیب 1 ضعیف و 5 عالی)') }}
                {{ Form::radio('transport', 1) }}
                {{ Form::label('transport', '1') }}
                {{ Form::radio('transport', 2) }}
                {{ Form::label('transport', '2') }}
                {{ Form::radio('transport', 3) }}
                {{ Form::label('transport', '3') }}
                {{ Form::radio('transport', 4) }}
                {{ Form::label('transport', '4') }}
                {{ Form::radio('transport', 5) }}
                {{ Form::label('transport', '5') }}
            </fieldset>

            <fieldset class="fieldset">
                @if ($errors->has('levels'))
                    <span class="label warning">
                        <strong>{{ $errors->first('levels') }}</strong>
                    </span>
                @endif
                {{ Form::label('levels', 'آیا در مراحل خرید به مشکلی برخوردید؟') }}
                {{ Form::radio('levels', 0) }}
                {{ Form::label('levels', 'بلی') }}
                {{ Form::radio('levels', 1) }}
                {{ Form::label('levels', 'خیر') }}
            </fieldset>

            <fieldset class="fieldset">
                @if ($errors->has('acquaint'))
                    <span class="label warning">
                        <strong>{{ $errors->first('acquaint') }}</strong>
                    </span>
                @endif
                <label>نحوه آشنایی با ما :</label><br>
                <label><input type="checkbox" name="acquaint[]" value="search"> موتورهای جست‌جو</label>
                <label><input type="checkbox" name="acquaint[]" value="social"> شبکه‌های اجتماعی</label>
                <label><input type="checkbox" name="acquaint[]" value="friends"> دوستان وآشنایان</label>
                <label><input type="checkbox" name="acquaint[]" value="adv"> تبلیغات</label>
                <label><input type="checkbox" name="acquaint[]" value="other"> دیگر راه‌ها</label>
            </fieldset>

            {{ Form::label('content', 'انتقادات، پیشنهادات و نظرات شما') }}
            {{ Form::textarea('content', null) }}

            <fieldset class="fieldset">
                @if ($errors->has('overall'))
                    <span class="label warning">
                        <strong>{{ $errors->first('overall') }}</strong>
                    </span>
                @endif
                {{ Form::label('overall', 'نمره کلی شما به سلامت‌لاین') }}
                {{ Form::radio('overall', 1) }}
                {{ Form::label('overall', '1') }}
                {{ Form::radio('overall', 2) }}
                {{ Form::label('overall', '2') }}
                {{ Form::radio('overall', 3) }}
                {{ Form::label('overall', '3') }}
                {{ Form::radio('overall', 4) }}
                {{ Form::label('overall', '4') }}
                {{ Form::radio('overall', 5) }}
                {{ Form::label('overall', '5') }}
            </fieldset>
                
                <div class="double-gap"></div>
                {{ Form::submit('ثبت نظر', array('class' => 'button success')) }}

        {!! Form::close() !!}

    </div>
</div>
<div class="double-gap"></div>

@endsection