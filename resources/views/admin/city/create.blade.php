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
                    <h4>شهر جدید</h4>
                </div>
                <div class="content">
                    {!! Form::open(array('route' => 'city.store')) !!}
                    
                        {{ Form::label('title', 'نام شهر') }}
                        {{ Form::text('title', null) }}

                        {{ Form::label('province', 'استان') }}
                            <select class="select2-multi" name="province_id">
                                @foreach($province as $item)
                                    <option value='{{ $item->id }}'>{{ $item->title }}</option>
                                @endforeach
                            </select>
                        
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('city.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection