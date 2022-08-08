@extends('layouts.admin')
@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection


@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">{{$role->name}}</div>
                <div class="content">
    {{ Form::model($role, array('route' => array('roles.update', $role->id), 'method' => 'PUT')) }}


        {{ Form::label('name', 'نام نقش') }}
        {{ Form::text('name', null, array('class' => '')) }}


    <h5>مجوزهای دسترسی</h5>
    <hr>
    @foreach ($permissions as $permission)

        {{Form::checkbox('permissions[]',  $permission->id, $role->permissions ) }}
        {{Form::label($permission->name, ucfirst($permission->name)) }}<br>

    @endforeach
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