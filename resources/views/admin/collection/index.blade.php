@extends('layouts.admin')
@section('NavItems')
    @include('admin.categories.NavItems')
@endsection
@section('content')
	<div class="double-gap"></div>
	<div class="grid-x grid-padding-x">
	@if (Session::has('success'))
		<div class="cell callout success">
			{{ Session::get('success') }}
		</div>
		<div class="double-gap"></div>
	@endif

		@include('admin.collection.main.table')
	</div>

	<div class="double-gap"></div>
@endsection