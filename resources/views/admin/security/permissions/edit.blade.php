@extends('layouts.admin')
@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection


@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">{{$permission->name}}</div>
                <div class="content">
                    {{ Form::model($permission, array('route' => array('permissions.update', $permission->id), 'method' => 'PUT')) }}

                    <div class="form-group">
                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null, array('class' => '')) }}
                    </div>
                    <br>
                    {{ Form::submit('ویرایش', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>
@endsection