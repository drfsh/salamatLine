@extends('layouts.admin')

@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        <div class="cell medium-6 medium-offset-3">
            <div class="box shadow rounded hover space">
                <div class="heading">نقش جدید</div>
                <div class="content">
                    {{ Form::open(array('url' => 'admin/roles')) }}

                        {{ Form::label('name', 'نام') }}
                        {{ Form::text('name', null, array('class' => '')) }}

                        <h5>تعیین مجوز</h5>
                        @foreach ($permissions as $permission)
                            {{ Form::checkbox('permissions[]',  $permission->id ) }}
                            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>
                        @endforeach
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