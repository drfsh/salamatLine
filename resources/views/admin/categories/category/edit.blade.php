@extends('layouts.admin')

@section('NavItems')
    @include('admin.categories.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">ویرایش {{$category->name}}</div>
                <div class="content">
                    {{ Form::model($category, array('route' => array('category.update', $category->id), 'method' => 'PUT')) }}

                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null) }}

                        {{ Form::label('slug', 'آدرس URL') }}
                        {{ Form::text('slug', null) }}
                        @if ($errors->has('slug'))
                            <span class="label warning">
                                <strong>{{ $errors->first('slug') }}</strong>
                            </span>
                        @endif
                        
                        {{ Form::label('parent', 'دسته والد') }}
                        <select class="simple-select" name="parent_id">
                            <option value="">شاخه اصلی</option>
                            @foreach($list as $item)
                                <option value='{{ $item->id }}' {{$category->parent_id==$item->id ? 'selected' : ''}}> {{ $item->name }}</option>
                            @endforeach
                        </select>
                        <div class="gap"></div>
                        {{ Form::label('description', 'محتوا') }}
                        {{ Form::textarea('description', null) }}


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