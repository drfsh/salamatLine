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
                    <h4>ویرایش {{$banner->title}}</h4>
                </div>
                <div class="content">
                    {!! Form::model($banner, ['route' => ['banner.update', $banner->id], 'method' => 'PUT', 'files' => true]) !!}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-4">
                            {{ Form::label('title', 'عنوان اسلایدر') }}
                            {{ Form::text('title', null) }}
                        </div>
                        <div class="cell medium-4">
                            {{ Form::label('pos', 'جایگاه') }}
                            {{ Form::text('pos', null) }}
                        </div>
                        <div class="cell medium-4">
                            {{ Form::label('link', 'لینک اسلایدر') }}
                            {{ Form::text('link', null) }}
                        </div>
                        <div class="cell medium-4">
                            {{ Form::label('page', 'صفحه') }}
                            <select class="simple-select" name="page">
                                <option value="0">صفحه اصلی</option>
                                @foreach($collection as $item)
                                    <option @if($banner->page==$item->id) selected @endif value='{{ $item->id }}'>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('featured_image', 'تصویر اصلی') }}
                            {{ Form::file('featured_image') }}
                        </div>
                        <div class="cell medium-6">
                            <img src="{{ $banner->tiny }}">
                        </div>
                        <div class="cell medium-3">
                            {{ Form::label('active', 'فعال') }}
                            {{ Form::checkbox('active', null, $banner->active) }}
                        </div>
                    </div>
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('banner.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection