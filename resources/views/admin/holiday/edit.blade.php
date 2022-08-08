@extends('layouts.admin')

@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-4 medium-offset-4">
            <div class="box shadow rounded hover space">
                <div class="heading">ویرایش {{$holiday->title}}</div>
                <div class="content">
                    {{ Form::model($holiday, array('route' => array('holiday.update', $holiday->id), 'method' => 'PUT')) }}

                        {{ Form::label('title', 'نام') }}
                        {{ Form::text('title', null) }}

                        {{ Form::label('day', 'روز') }}
                        <div class="input-group">
                            <span class="input-group-label">تاریخ: {{Verta($holiday->day)->format('l d F Y')}}</span>
        {{--                     {{ Form::date('day', $holiday->day, ['class' => 'input-group-field']) }} --}}
                            <input type="text" id="input1" name="day" autocomplete="off" value="{{$holiday->day}}" class="input-group-field" readonly style="cursor: pointer;" />
                            <span id="span1"></span>   

                        </div>

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


@section('js')
    @include('admin.global.js.datepicker')
@endsection