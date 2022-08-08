@extends('layouts.admin')

@section('NavItems')
    @include('admin.categories.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">دسته‌بندی جدید</div>
                <div class="content">
                    {{ Form::open(array('route' => 'category.store')) }}

                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null) }}
                        @if ($errors->has('name'))
                            <span class="label warning">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif

                        {{ Form::label('slug', 'آدرس URL') }}
                        {{ Form::text('slug', null) }}

                        {{ Form::label('parent', 'دسته والد') }}
                        <select class="simple-select" name="parent_id">
                            <option value="">شاخه اصلی</option>
                            @foreach($list as $item)
                                <option value='{{ $item->id }}'> {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="gap"></div>
                        {{ Form::label('description', 'محتوا') }}
                        {{ Form::textarea('description', null) }}


                        <div class="gap"></div>

                    {{ Form::submit('افزودن', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>

@endsection