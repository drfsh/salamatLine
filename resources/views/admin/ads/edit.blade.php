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
                    <h4>ویرایش {{$menu->name}}</h4>
                </div>
                <div class="content">
                    {!! Form::model($menu, ['route' => ['ads.update', $menu->id], 'method' => 'PUT','files' => true]) !!}


                    {{ Form::label('body', 'متن') }}
                    {{ Form::text('body', null) }}

                    {{ Form::label('link', 'لینک') }}
                    {{ Form::text('link', null) }}

                    {{ Form::label('color', 'رنگ پس زمینه') }}
                    {{ Form::color('color', null) }}

                    {{ Form::label('text_color', 'رنگ متن') }}
                    {{ Form::color('text_color', null) }}

                    {{ Form::label('img', 'تصویر') }}
                    {{ Form::file('img', null) }}

                    {{ Form::label('active', 'فعال') }}
                    {{ Form::checkbox('active', null) }}

                    <div class="double-gap"></div>
                    {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                    <a href="{{ route('ads.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
@endsection