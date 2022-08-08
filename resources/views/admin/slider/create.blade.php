@extends('layouts.admin')
@section('NavItems')
    @include('admin.page.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-8 medium-offset-2">
            <div class="box shadow rounded hover space">
                <div class="heading">
                    <h4>اسلایدر جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'slider.store', 'files' => true)) !!}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-6">
                            {{ Form::label('title', 'عنوان اسلایدر') }}
                            {{ Form::text('title', null) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('link', 'لینک صفحه') }}
                            {{ Form::text('link', null) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('featured_image', 'تصویر اصلی') }}
                            {{ Form::file('featured_image') }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('active', 'فعال') }}
                            {{ Form::checkbox('active', null, true) }}
                        </div>
                        <div class="cell">
                            {{ Form::label('content', 'محتوا') }}
                            {{ Form::textarea('content', null, ['id' => 'editor']) }}
                        </div>
                    </div>
                        
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('slider.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection