{{ Form::model( array('route' => array('faq_new'), 'method' => 'post')) }}

<div class="grid-x grid-padding-x" style="margin-top: 25px;">
    @if (Session::has('success'))
        <div class="cell">
            <div class="cell callout success">
                {{ Session::get('success') }}
            </div>
            <div class="double-gap"></div>
        </div>
    @endif


    <div class="cell medium-3">

        {{ Form::text('name', null,['placeholder'=>'نام و نام خانوادگی']) }}
        @if ($errors->has('name'))
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="cell medium-3">
        {{ Form::text('email', null,['placeholder'=>'آدرس ایمیل']) }}
        @if ($errors->has('email'))
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="cell medium-3">
        {{ Form::text('mobile', null,['placeholder'=>'شماره تماس']) }}
        @if ($errors->has('mobile'))
            <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
        @endif
    </div>
    <div class="cell medium-3">
        {{ Form::text('title', null,['placeholder'=>'موضوع']) }}
        @if ($errors->has('title'))
            <span class="invalid-feedback">{{ $errors->first('title') }}</span>
        @endif
    </div>
    <div class="cell medium-12">
        {{ Form::textarea('body', null,['style'=>'height: 335px;']) }}
        @if ($errors->has('body'))
            <span class="invalid-feedback">{{ $errors->first('text') }}</span>
        @endif
    </div>

</div>

<div class="text-right">
    {{ Form::submit('ثبت و ارسال', array('class' => 'button add-shop m-0')) }}
</div>
{{ Form::close() }}
