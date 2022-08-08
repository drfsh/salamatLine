@extends('layouts.admin')

@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">افزودن کاربر با شماره همراه</div>
                <div class="content">
                    {!! Form::open(array('route' => 'mobile.store')) !!}

                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null) }}
                        @if ($errors->has('name'))
                            <span class="label warning">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        {{ Form::label('lname', 'نام خانوادگی') }}
                        {{ Form::text('lname', null) }}
                        @if ($errors->has('lname'))
                            <span class="label warning">
                                <strong>{{ $errors->first('lname') }}</strong>
                            </span>
                        @endif

                        {{ Form::label('mobile', 'شماره تلفن همراه') }}
                        {{ Form::text('mobile', null) }}
                        @if ($errors->has('mobile'))
                            <span class="label warning">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                        @endif

                        {{ Form::submit('افزودن', array('class' => 'button success')) }}
                        <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>
                        
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>

@endsection