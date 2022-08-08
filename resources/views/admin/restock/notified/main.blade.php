@extends('layouts.admin')
@section('NavItems')
    @include('admin.restock.NavItems')
@endsection
@section('content')
    <div class="grid-x grid-padding-x">
        @include('admin.restock.notified.table')
    </div>
@endsection