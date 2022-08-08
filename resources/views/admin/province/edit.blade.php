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
                    <h4>ویرایش {{$province->title}}</h4>
                </div>
                <div class="content">
                    {!! Form::model($province, ['route' => ['province.update', $province->id], 'method' => 'PUT']) !!}

                        {{ Form::label('title', 'نام استان') }}
                        {{ Form::text('title', null) }}
                        
                        <div class="double-gap"></div>
                        {{ Form::submit('ذخیره', array('class' => 'button success')) }}
                        <a href="{{ route('province.index') }}" class="button alert">بازگشت</a>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection