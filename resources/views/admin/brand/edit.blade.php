@extends('layouts.admin')

@section('NavItems')
    @include('admin.categories.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">ویرایش {{$brand->title}}</div>
                <div class="content">
                    {{ Form::model($brand, array('route' => array('brand.update', $brand->id), 'method' => 'PUT', 'files' => true)) }}

                        {{ Form::label('title', 'نام') }}
                        {{ Form::text('title', null) }}
                        @if ($errors->has('title'))
                            <span class="label warning">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                        @endif

                        {{ Form::label('slug', 'آدرس URL') }}
                        {{ Form::text('slug', null) }}
                        @if ($errors->has('slug'))
                            <span class="label warning">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif

                        <div class="gap"></div>
                        <div class="grid-x grid-padding-x">
                            <div class="cell medium-6">
                                {{ Form::label('featured_image', 'لوگو برند') }}
                                {{ Form::file('featured_image') }}
                            </div>
                            <div class="cell medium-6">
                                <img src="{{$brand->tiny}}">
                            </div>
                        </div>

                        {{ Form::label('content', 'محتوا') }}
                        {{ Form::textarea('content', null) }}
                        @if($brand->seo)
                            {{ Form::label('metadesc', 'MetaDesc') }}
                            {{ Form::textarea('metadesc', $brand->seo->metadesc, ['rows' => 3]) }}

                            {{ Form::label('keywords', 'کلمات کلیدی') }}
                            {{ Form::textarea('keywords', $brand->seo->keywords, ['rows' => 3]) }}
                        @else
                            {{ Form::label('metadesc', 'MetaDesc') }}
                            {{ Form::textarea('metadesc', null, ['rows' => 3]) }}

                            {{ Form::label('keywords', 'کلمات کلیدی') }}
                            {{ Form::textarea('keywords', null, ['rows' => 3]) }}
                        @endif
                        <div class="gap"></div>

                    {{ Form::submit('ویرایش', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>

@endsection