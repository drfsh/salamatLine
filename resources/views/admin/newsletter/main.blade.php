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
            <div class="title_b">خبرنامه

                <a href="{{route('newsletter.create')}}">
                <span class="create">
                    <i class="fas fa-plus"></i>
                    ارسال
                </span>
                </a>
            </div>
            <div class="box rounded">
                @include('admin.newsletter.table')
            </div>
            <div class="gap"></div>
            {!! $emails->render() !!}
        </div>
    </div>
    <div class="double-gap"></div>

@endsection
