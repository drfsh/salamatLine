@extends('layouts.admin')
@section('content')

	<div class="double-gap"></div>

		@include('admin.components.parts.color.main')

	<hr class="large">

		@include('admin.components.parts.typography.paragraph')
		@include('admin.components.parts.typography.heading')

	<hr class="large">

		@include('admin.components.parts.table.main')

	<hr class="large">

		@include('admin.components.parts.button.main')
		@include('admin.components.parts.forms.main')
		@include('admin.components.parts.tab.main')

	<div class="double-gap"></div>

@endsection