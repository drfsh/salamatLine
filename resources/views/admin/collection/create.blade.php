@extends('layouts.admin')
@section('NavItems')
    @include('admin.categories.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell medium-10 medium-offset-1">
            <landing-create></landing-create>
        </div>
    </div>
	<div class="double-gap"></div>
@endsection

@section('js')
    @include('admin.global.CkEditor')
@endsection