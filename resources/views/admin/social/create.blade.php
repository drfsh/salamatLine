@extends('layouts.admin')
@section('NavItems')
    @include('admin.page.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-4 medium-offset-4">
            <div class="box shadow rounded hover space">
                <div class="heading">
                    <h4>شبکه‌های اجتماعی جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'social.store')) !!}
                    
                        {{ Form::label('title', 'نام شبکه‌های اجتماعی') }}
                        {{ Form::text('title', null) }}

                        {{ Form::label('icon', 'آیکون') }}
                        {{ Form::text('icon', null) }}

                        {{ Form::label('link', 'لینک') }}
                        {{ Form::text('link', null) }}

                        {{ Form::label('active', 'فعال') }}
                        {{ Form::checkbox('active', null, true) }}
                        
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('social.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection