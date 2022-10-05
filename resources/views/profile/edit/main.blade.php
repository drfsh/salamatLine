@extends('layouts.profile')

@section('content')

    <div class="box2" style="padding: 3px">
        <div class="title">
            جزییات حساب شما
        </div>
        <div class="bbox edit-profile">
            {{ Form::model($user, array('route' => array('UpdateProfile', $user->id), 'method' => 'PUT')) }}

            <div class="grid-x grid-padding-x">
                @if (Session::has('success'))
                    <div class="cell">
                        <div class="cell callout success">
                            {{ Session::get('success') }}
                        </div>
                        <div class="double-gap"></div>
                    </div>
                    <script>
                        setTimeout(function () {
                            location.href = '/profile'
                        },2000)
                    </script>
                @endif
                @if (Session::has('passwordT'))
                    <div class="cell">
                        <div class="cell callout success">
                            {{ Session::get('passwordT') }}
                        </div>
                        <div class="double-gap"></div>
                    </div>
                @endif
                @if (Session::has('passwordE'))
                    <div class="cell">
                        <div class="cell callout danger">
                            {{ Session::get('passwordE') }}
                        </div>
                        <div class="double-gap"></div>
                    </div>
                @endif


                <div class="cell medium-6">
                    {{ Form::label('full_name', 'نام و نام خانوادگی') }}
                    {{ Form::text('full_name', null) }}
                    @if ($errors->has('full_name'))
                        <span class="invalid-feedback">{{ $errors->first('full_name') }}</span>
                    @endif
                </div>
                <div class="cell medium-6">
                    {{ Form::label('code_m', 'کدملی') }}
                    {{ Form::text('code_m', null) }}
                    @if ($errors->has('code_m'))
                        <span class="invalid-feedback">{{ $errors->first('code_m') }}</span>
                    @endif
                </div>
                <div class="cell medium-12">
                    {{ Form::label('nama_name', 'نام نمایشی') }}
                    <span class="info">(نام شما به این صورت در حصاب کاربری و نظرات دیده خواهد شد)</span>
                    {{ Form::text('nama_name', null) }}
                    @if ($errors->has('nama_name'))
                        <span class="invalid-feedback">{{ $errors->first('nama_name') }}</span>
                    @endif
                </div>
                <div class="cell medium-12">
                    {{ Form::label('email', 'آدرس ایمیل') }}
                    {{ Form::text('email', null) }}
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="cell medium-12">
                    {{ Form::label('password1', 'گذرواژه جدید') }}
                    <span class="info">(درصورتی که قصد تغییر ندارید خالی بگذارید)</span>
                    {{ Form::text('password1', null) }}
                </div>
                <div class="cell medium-12">
                    {{ Form::label('password2', 'تکرار گذرواژه جدید') }}
                    {{ Form::text('password2', null) }}
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                    @endif
                    @error('name')
                    <p>{{ $message }}</p>
                    @enderror

                </div>

                <div class="cell medium-12">
                    {{ Form::label('mobile', 'شماره تلفن همراه') }}
                    {{ Form::text('mobile', null) }}
                    @if ($errors->has('mobile'))
                        <span class="invalid-feedback">{{ $errors->first('mobile') }}</span>
                    @endif
                </div>
            </div>

            <div class="text-left">
                {{ Form::submit('ذخیره تغییرات', array('class' => 'button add-shop m-0')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
