@extends('layouts.admin')
@section('NavItems')
    @include('admin.categories.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-8 medium-offset-2">
            <div class="box shadow rounded hover space">
                <div class="heading">
                    <h4>ویرایش {{$collection->title}}</h4>
                </div>
                <div class="content">
                    {!! Form::model($collection, ['route' => ['collection.update', $collection->id], 'method' => 'PUT', 'files' => true]) !!}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-6">
                            {{ Form::label('title', 'نام صفحه') }}
                            {{ Form::text('title', null) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('slug', 'تکه آدرس URL') }}
                            {{ Form::text('slug', null) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('sort_order', 'چینش') }}
                            {{ Form::text('sort_order', null) }}
                        </div>
                        <div class="cell medium-3">
                            {{ Form::label('active', 'فعال') }}
                            {{ Form::checkbox('active', null, $collection->active) }}
                        </div>
                        <div class="cell medium-3">
                            {{ Form::label('feature', 'برگزیده') }}
                            {{ Form::checkbox('feature', null, $collection->feature) }}
                        </div>

                        <div class="cell medium-12">
                            {{ Form::label('', 'بنر ها') }}

                            @include('admin.collection.edit.table')

                        </div>

                        <div class="cell medium-6">
                            {{ Form::label('featured_image', 'تصویر اصلی') }}
                            {{ Form::file('featured_image') }}
                        </div>
                        <div class="cell medium-6">
                            <img src="{{ $collection->image }}">
                        </div>
                        <div class="cell">
                            {{ Form::label('products', 'محصولات') }}
                            <select class="simple-select" name="products[]" multiple style="width:100%">
                                @foreach($products as $item)
                                    <option value='{{ $item->id }}' {{in_array($item->id, $product) ? 'selected':''}}>{{ $item->id }}- {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="cell">
                            {{ Form::label('content', 'محتوا') }}
                            {{ Form::textarea('content', null, ['id' => 'editor']) }}
                        </div>
                        @if($collection->seo)
                            <div class="cell medium-6">
                                {{ Form::label('metadesc', 'MetaDesc') }}
                                {{ Form::textarea('metadesc', $collection->seo->metadesc, ['rows' => 3]) }}
                            </div>
                            <div class="cell medium-6">
                                {{ Form::label('keywords', 'کلمات کلیدی') }}
                                {{ Form::textarea('keywords', $collection->seo->keywords, ['rows' => 3]) }}
                            </div>
                        @else
                            <div class="cell medium-6">
                                {{ Form::label('metadesc', 'MetaDesc') }}
                                {{ Form::textarea('metadesc', null, ['rows' => 3]) }}
                            </div>
                            <div class="cell medium-6">
                                {{ Form::label('keywords', 'کلمات کلیدی') }}
                                {{ Form::textarea('keywords', null, ['rows' => 3]) }}
                            </div>
                        @endif
                    </div>
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('collection.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection

@section('js')
    @include('admin.global.CkEditor')
@endsection