@extends('layouts.admin')

@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">افزودن کاربر</div>
                <div class="content">
                    {{ Form::open(array('url' => 'admin/users')) }}

                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', '', array('class' => '')) }}


                        {{ Form::label('email', 'ایمیل') }}
                        {{ Form::email('email', '', array('class' => '')) }}

                        @foreach ($roles as $role)
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}

                        @endforeach

                        {{ Form::label('password', 'رمز عبور') }}
                        {{ Form::password('password', array('class' => '')) }}

                        {{ Form::label('password', 'تکرار رمز') }}
                        {{ Form::password('password_confirmation', array('class' => '')) }}

                        {{ Form::submit('افزودن', array('class' => 'button success')) }}
                        <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>
                        
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>








@endsection