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
                    <h4>ویرایش {{$district->title}}</h4>
                </div>
                <div class="content">
                    {!! Form::model($district, ['route' => ['district.update', $district->id], 'method' => 'PUT']) !!}

                        {{ Form::label('title', 'نام دسته‌بندی') }}
                        {{ Form::text('title', null) }}

                        {{ Form::label('city', 'استان') }}
                        <select class="select2-multi" name="city_id">
                            @foreach($city as $item)
                                <iframe sr></iframe>
                                <option value='{{ $item->id }}' {{$district->city_id==$item->id ? 'selected' : ''}}>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('district.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection