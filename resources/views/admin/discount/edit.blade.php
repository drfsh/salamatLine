@extends('layouts.admin')
@section('NavItems')
    @include('admin.discount.NavItems')
@endsection
@section('content')
    <div class="double-gap"></div>
    <div class="grid-x grid-padding-x">
        <div class="cell">
            <edit-discount discount="{{$discount}}" ></edit-discount>
{{--            <discount-edit :discount="{{$discount}}" ></discount-edit>--}}
        </div>
    </div>
	<div class="double-gap"></div>
@endsection