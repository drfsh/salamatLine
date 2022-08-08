@extends('layouts.admin')
@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection



@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">مجوز جدید</div>
                <div class="content">
                    {{ Form::open(array('url' => 'admin/permissions')) }}
                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', '', array('class' => '')) }}

                    @if(!$roles->isEmpty())
                        <h4>افزودن این مجوز به گروه‌های:</h4>
                        @foreach ($roles as $role) 
                            {{ Form::checkbox('roles[]',  $role->id ) }}
                            {{ Form::label($role->name, ucfirst($role->name)) }}<br>
                        @endforeach
                    @endif
                    <br>
                    {{ Form::submit('افزودن', array('class' => 'button success')) }}
                    <a href="{{ url()->previous() }}" class="button alert">بازگشت</a>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    <div class="double-gap"></div>










@endsection