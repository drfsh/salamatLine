@extends('layouts.admin')

@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">
                    <h4>ویرایش اطلاعات تماس</h4>
                </div>
                <div class="content">
                    {!! Form::model($contact, ['route' => ['contactinfo.update', $contact->id], 'method' => 'PUT', 'files' => true]) !!}
                    {{ Form::label('phone1', 'تلفن ثابت تایم اداری') }}
                    {{ Form::text('phone1', null) }}

                    {{ Form::label('phone2', 'شماره تماس تایم غیر اداری') }}
                    {{ Form::text('phone2', null) }}

                    {{ Form::label('whatsapp', 'واتساپ') }}
                    {{ Form::text('whatsapp', null) }}

                    {{ Form::label('telegram', 'تلگرام') }}
                    {{ Form::text('telegram', null) }}

                    {{ Form::label('twitter', 'توویتر') }}
                    {{ Form::text('twitter', null) }}

                    {{ Form::label('instagram', 'اینستاگرام') }}
                    {{ Form::text('instagram', null) }}
                    {{ Form::label('facebook', 'فیسبوک') }}
                    {{ Form::text('facebook', null) }}

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

                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-6">
                            {{ Form::label('mappin_image', 'pin نقشه') }}
                            {{ Form::file('mappin_image') }}
                        </div>
                        <div class="cell medium-6">
                            <img src="{{$contact->mappin}}">
                        </div>
                    </div>

                    <div class="grid-x grid-padding-x">
                        <div class="cell medium-6">
                            {{ Form::label('featured_image', 'تصویر') }}
                            {{ Form::file('featured_image') }}
                        </div>
                        <div class="cell medium-6">
                            <img src="{{$contact->image}}">
                        </div>
                    </div>

                    @if($contact->seo)
                        {{ Form::label('metadesc', 'MetaDesc') }}
                        {{ Form::textarea('metadesc', $contact->seo->metadesc, ['rows' => 3]) }}

                        {{ Form::label('keywords', 'کلمات کلیدی') }}
                        {{ Form::textarea('keywords', $contact->seo->keywords, ['rows' => 3]) }}
                    @else
                        {{ Form::label('metadesc', 'MetaDesc') }}
                        {{ Form::textarea('metadesc', null, ['rows' => 3]) }}

                        {{ Form::label('keywords', 'کلمات کلیدی') }}
                        {{ Form::textarea('keywords', null, ['rows' => 3]) }}
                    @endif

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
