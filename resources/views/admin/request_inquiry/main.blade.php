@extends('layouts.admin')

@section('content')

    <div class="grid-x grid-padding-x">
        @if (Session::has('success'))
            <div class="cell callout success">
                {{ Session::get('success') }}
            </div>
            <div class="double-gap"></div>
        @endif
        <div class="cell medium-10 medium-offset-1">
            <div class="box shadow rounded hover space" style="margin-top: 10px;">
                <div class="heading">متن صفحه</div>
                <div class="content">
                    {!! Form::open(array('route' => 'inquiryText')) !!}

                    {{ Form::label('text', 'متن') }}
                    {{ Form::textarea('text', $text,['id' => 'editor']) }}

                    {{ Form::submit('ویرایش', array('class' => 'button success','style'=>'margin-top:5px')) }}

                    {!! Form::close() !!}
                </div>
            </div>

            <div class="title_b">فروش و استعلام محصولات سلامن لاین</div>
            <div class="box rounded">
                @include('admin.request_inquiry.table')
            </div>
            <div class="gap"></div>
            {!! $list->render() !!}
        </div>
    </div>
    <div class="double-gap"></div>

@endsection

@section('js')
    @include('admin.global.CkEditor')
@endsection