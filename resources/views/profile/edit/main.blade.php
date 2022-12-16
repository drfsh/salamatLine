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
                <div class="cell small-12 medium-6">
                    <div class="text-l">
                        {{ Form::label('nama_name', 'نام نمایشی') }}
                        <span class="info">(نام شما به این صورت در حساب کاربری و نظرات دیده خواهد شد)</span>
                    </div>
                    {{ Form::text('nama_name', null) }}
                    @if ($errors->has('nama_name'))
                        <span class="invalid-feedback">{{ $errors->first('nama_name') }}</span>
                    @endif
                </div>
                <div class="cell medium-6">
                    {{ Form::label('email', 'آدرس ایمیل') }}
                    {{ Form::text('email', null) }}
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                    @if($user->type)
                        <div class="cell medium-6">
                            {{ Form::label('role', 'سمت شما') }}
                            <select name="role" >
                                <option value="0">انتخاب</option>
                                @foreach($role as $v)
                                    <option @if($user->role==$v->id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('specialty', 'متخصص') }}
                            <select name="specialty">
                                <option value="0">انتخاب</option>
                                @foreach($specialties as $v)
                                <option @if($user->specialty==$v->id) selected @endif value="{{$v->id}}">{{$v->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

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

                <edit-mobile class="cell @if($user->type) small-12 medium-6 @else medium-12 @endif" mobile="{{$user->mobile}}"></edit-mobile>
                    @if($user->type)
                        <div class="cell medium-6">
                            {{ Form::label('phone', 'شماره دفتر یا مرکز شما') }}
                            {{ Form::number('phone', null) }}
                        </div>
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    @endif

            </div>

            <div class="text-left">
                {{ Form::submit('ذخیره تغییرات', array('class' => 'button add-shop m-0')) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>

@endsection
