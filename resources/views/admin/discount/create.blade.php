@extends('layouts.admin')
@section('NavItems')
    @include('admin.discount.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell">
            <created-discount></created-discount>
{{--            <discount-create></discount-create>--}}
        </div>
    </div>
	<div class="double-gap"></div>
@endsection