@extends('layouts.admin')

@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">
                    <h4>اطلاعات تماس</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'contactinfo.store', 'files' => true)) !!}
                        {{ Form::label('phone1', 'تلفن یک') }}
                        {{ Form::text('phone1', null) }}

                        {{ Form::label('phone2', 'تلفن دو') }}
                        {{ Form::text('phone2', null) }}

                        {{ Form::label('phone3', 'تلفن سه') }}
                        {{ Form::text('phone3', null) }}

                        {{ Form::label('fax', 'فکس') }}
                        {{ Form::text('fax', null) }}

                        {{ Form::label('email', 'پست الکترونیک') }}
                        {{ Form::text('email', null) }}

                        {{ Form::label('address', 'آدرس') }}
                        {{ Form::text('address', null) }}

                        {{ Form::label('mapurl', 'url آدرس') }}
                        {{ Form::text('mapurl', null) }}

                        {{ Form::label('lat', 'عرض جغرافیایی') }}
                        {{ Form::text('lat', null) }}

                        {{ Form::label('long', 'طول جغرافیایی') }}
                        {{ Form::text('long', null) }}

                        {{ Form::label('zoom', 'زوم نقشه') }}
                        {{ Form::text('zoom', null) }}

                        {{ Form::label('mappin_image', 'pin نقشه') }}
                        {{ Form::file('mappin_image') }}

                        {{ Form::label('featured_image', 'تصویر') }}
                        {{ Form::file('featured_image') }}

                        {{ Form::label('metadesc', 'MetaDesc') }}
                        {{ Form::textarea('metadesc', null, ['rows' => 3]) }}

                        {{ Form::label('keywords', 'کلمات کلیدی') }}
                        {{ Form::textarea('keywords', null, ['rows' => 3]) }}
                        
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('contactinfo.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection