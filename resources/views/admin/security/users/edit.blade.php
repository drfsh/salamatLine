@extends('layouts.admin')

@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">{{$user->name}}</div>
                <div class="content">
                    {{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
  
                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null, array('class' => '')) }}

                        {{ Form::label('email', 'ایمیل') }}
                        {{ Form::email('email', null, array('class' => '')) }}
  
                        <h5>افزودن نقش</h5>

                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

                        @endforeach
 
{{--                         {{ Form::label('password', 'رمز عبور') }}
                        {{ Form::password('password', array('class' => '')) }}

                        {{ Form::label('password_confirmation', 'تکرار رمز') }}
                        {{ Form::password('password_confirmation', array('class' => '')) }} --}}

                    {{ Form::submit('ویرایش', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>

@endsection