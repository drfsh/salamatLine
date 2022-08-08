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
                    <h4>محله جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'district.store')) !!}
                    
                        {{ Form::label('title', 'نام محله') }}
                        {{ Form::text('title', null) }}

                        {{ Form::label('city', 'شهر') }}
                        <select class="select2-multi" name="city_id">
                            @foreach($city as $item)
                                <option value='{{ $item->id }}'>{{ $item->title }}</option>
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