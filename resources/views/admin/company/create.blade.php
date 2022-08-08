@extends('layouts.admin')

@section('NavItems')
    @include('admin.categories.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">شرکت جدید</div>
                <div class="content">
                    {{ Form::open(array('route' => 'company.store', 'files' => true)) }}

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

                        {{ Form::label('brands', 'برند') }}
                        <select class="simple-select" name="brands[]" multiple>
                            @foreach($brands as $item)
                                <option value='{{ $item->id }}'>{{ $item->title }}</option>
                            @endforeach
                        </select>

                        {{ Form::label('featured_image', 'لوگو شرکت') }}
                        {{ Form::file('featured_image') }}

                        {{ Form::label('content', 'محتوا') }}
                        {{ Form::textarea('content', null) }}

                        {{ Form::label('metadesc', 'MetaDesc') }}
                        {{ Form::textarea('metadesc', null, ['rows' => 3]) }}

                        {{ Form::label('keywords', 'کلمات کلیدی') }}
                        {{ Form::textarea('keywords', null, ['rows' => 3]) }}

                        <div class="gap"></div>

                    {{ Form::submit('افزودن', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>

@endsection