@extends('layouts.admin')

@section('NavItems')
    @include('admin.security.users.NavItems')
@endsection

@section('content')

    <div class="grid-x grid-padding-x">
        @if (Session::has('success'))
            <div class="cell callout success">
                {{ Session::get('success') }}
            </div>
            <div class="double-gap"></div>
        @endif
        <div class="cell medium-10 medium-offset-1">
            <div class="title_b">کاربران حضوری

                <a href="{{route('person.create')}}">
                <span class="create">
                    <i class="fas fa-plus"></i>
                    ایجاد
                </span>
                </a>
            </div>
            <div class="box rounded">
                @include('admin.security.users.person.table')
            </div>
            <div class="gap"></div>
            {!! $users->render() !!}
        </div>
    </div>
    <div class="double-gap"></div>

@endsection
