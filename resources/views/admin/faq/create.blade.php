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
                    <h4>سوال جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'faq.store', 'files' => true)) !!}
                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-12">
                            {{ Form::label('title', 'عنوان سوال') }}
                            {{ Form::text('title', null) }}
                        </div>
                        <div class="cell medium-12">
                            {{ Form::label('body', 'پاسخ') }}
                            {{ Form::textarea('body', null) }}
                        </div>
                        <div class="cell medium-6">
                            {{ Form::label('active', 'فعال') }}
                            {{ Form::checkbox('active', null, true) }}
                        </div>
                    </div>
                    <div class="double-gap"></div>
                    {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                    <a href="{{ route('faq.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
@endsection