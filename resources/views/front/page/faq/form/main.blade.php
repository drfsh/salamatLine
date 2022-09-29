{{ Form::model( array('route' => array('faq_new'), 'method' => 'post')) }}

<div class="grid-x grid-padding-x forms" style="margin-top: 25px;">
    @if (Session::has('success'))
        <div class="cell">
            <div class="cell callout success" style="text-align: center;border: 0;background: #03B700;color: white;padding: 11px;">
                {{ Session::get('success') }}
            </div>
            <div class="double-gap"></div>
        </div>
    @endif


    <div class="cell medium-6">
        {{Form::label('name','نام و نام خانوادگی')}}
        {{ Form::text('name', null,['placeholder'=>'']) }}
        @if ($errors->has('name'))
            <span class="invalid-feedback">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{Form::label('mobile','شماره تماس')}}
        {{ Form::text('mobile', null,['placeholder'=>'']) }}
        @if ($errors->has('mobile'))
            <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{Form::label('email','آدرس ایمیل')}}
        {{ Form::text('email', null,['placeholder'=>'']) }}
        @if ($errors->has('email'))
            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="cell medium-6">
        {{Form::label('title','موضوع')}}
        {{ Form::text('title', null,['placeholder'=>'']) }}
        @if ($errors->has('title'))
            <span class="invalid-feedback">{{ $errors->first('title') }}</span>
        @endif
    </div>
    <div class="cell medium-12" style="width: 100%;">
        {{Form::label('body','موضوع')}}
        {{ Form::textarea('body', null,['style'=>'height: 133px;width: 100%;']) }}
        @if ($errors->has('body'))
            <span class="invalid-feedback">{{ $errors->first('text') }}</span>
        @endif
    </div>

</div>

<div class="text-right">
    {{ Form::submit('ثبت و ارسال', array('class' => 'button add-shop m-0')) }}
</div>
{{ Form::close() }}
