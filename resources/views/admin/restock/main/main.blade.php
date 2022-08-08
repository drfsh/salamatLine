@extends('layouts.admin')
@section('NavItems')
    @include('admin.restock.NavItems')
@endsection
@section('content')
    @include('admin.restock.main.card')
    <div class="grid-x grid-padding-x">
        @include('admin.restock.main.table')
    </div>
@endsection