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
            <div class="title_b">درخواست های تماس</div>
            <div class="box rounded">
                @include('admin.request_contact.table')
            </div>
            <div class="gap"></div>
            {!! $list->render() !!}
        </div>
    </div>
    <div class="double-gap"></div>

@endsection
