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
                    <h4>مجموعه جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'collection.store', 'files' => true)) !!}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-6">
                            {{ Form::label('title', 'نام مجموعه') }}
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
                            {{ Form::checkbox('active', null, true) }}
                        </div>
                        <div class="cell medium-3">
                            {{ Form::label('feature', 'برگزیده') }}
                            {{ Form::checkbox('feature', null) }}
                        </div>
                        <div class="cell" style="font-size: 13px;margin: 12px 0;">
                            پس از ساخت صفحه میتوانید بنر را تنظیم کنید.
                            <br>
                            (راهنمایی ایجاد بنر در صفحه لندینگ: مراجعه به بخش بنر ها و ایجاد بنر برای صفحه لندینگ ، مراجعه به صفحه ویرایش لندینگ مورد نظر پس از ایجاد.)
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('featured_image', 'تصویر اصلی') }}
                            {{ Form::file('featured_image') }}
                        </div>
                        <div class="cell">
                            {{ Form::label('products', 'محصولات') }}
                            <select class="simple-select" name="products[]" multiple style="width:100%">
                                @foreach($products as $item)
                                    <option value='{{ $item->id }}'>{{ $item->id }}- {{ $item->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="cell">
                            {{ Form::label('content', 'محتوا') }}
                            {{ Form::textarea('content', null, ['id' => 'editor']) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('metadesc', 'MetaDesc') }}
                            {{ Form::textarea('metadesc', null, ['rows' => 3]) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('keywords', 'کلمات کلیدی') }}
                            {{ Form::textarea('keywords', null, ['rows' => 3]) }}
                        </div>
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