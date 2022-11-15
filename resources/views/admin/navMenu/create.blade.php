@extends('layouts.admin')
@section('NavItems')
    @include('admin.province.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-4 medium-offset-4">
            <div class="box shadow rounded hover space">
                <div class="heading">
                    <h4>منو جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'navMenu.store')) !!}

                    {{ Form::label('name', 'نام منو') }}
                    {{ Form::text('name', null) }}

                    {{ Form::label('link', 'لینک') }}
                    {{ Form::text('link', null) }}

                    {{ Form::label('color', 'رنگ پس زمینه') }}
                    {{ Form::color('color', '#ffffff') }}

                    {{ Form::label('text_color', 'رنگ متن') }}
                    {{ Form::color('text_color', '#494747') }}

                    {{ Form::label('icon', 'ایکن') }}
                    {{ Form::text('icon', null) }}

                    <div class="double-gap"></div>
                    {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                    <a href="{{ route('navMenu.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
@endsection