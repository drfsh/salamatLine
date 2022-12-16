{{ Form::model( array('route' => array('inquiry_new'), 'method' => 'post')) }}

<div class="grid-x grid-padding-x" style="margin-top: 25px;">
    @if (Session::has('success'))
        <div class="cell">
            <div class="cell callout success">
                {{ Session::get('success') }}
            </div>
            <div class="double-gap"></div>
        </div>
    @endif


    <div class="cell medium-6">
        {{ Form::label('office', 'نام ارگان یا سازمان مربوط') }}
        {{ Form::text('office', null,['class'=>'not']) }}
        @if ($errors->has('office'))
            <span style="position: unset;" class="invalid-feedback">{{ $errors->first('office') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{ Form::label('name', 'نام و نام خانوادگی') }}
        {{ Form::text('name', null,['class'=>'not']) }}
        @if ($errors->has('name'))
            <span style="position: unset;" class="invalid-feedback">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{ Form::label('email', 'آدرس ایمیل') }}
        {{ Form::email('email', null) }}
        @if ($errors->has('email'))
            <span style="position: unset;" class="invalid-feedback">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{ Form::label('mobile', 'شماره تلفن') }}
        {{ Form::number('mobile', null) }}
        @if ($errors->has('mobile'))
            <span style="position: unset;" class="invalid-feedback">{{ $errors->first('mobile') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{ Form::label('products', 'نام محصول درخواستی') }}
        {{ Form::text('products', null,['class'=>'not']) }}
        @if ($errors->has('products'))
            <span style="position: unset;" class="invalid-feedback">{{ $errors->first('products') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{ Form::label('count', 'تعداد محصول') }}
        {{ Form::number('count', null) }}
        @if ($errors->has('count'))
            <span style="position: unset;" class="invalid-feedback">{{ $errors->first('count') }}</span>
        @endif
    </div>

</div>

<div class="text-right">
    {{ Form::submit('ارسال درخواست', array('class' => 'button add-shop m-0','style'=>'line-height: 8px;')) }}
</div>
{{ Form::close() }}
