@extends('layouts.admin')

@section('NavItems')
	@include('admin.categories.NavItems')
@endsection

@section('content')
	<div class="grid-x grid-padding-x">
		<div class="cell medium-6 medium-offset-3">
			@if (Session::has('success'))
				<div class="cell callout success">
					{{ Session::get('success') }}
				</div>
				<div class="double-gap"></div>
			@endif
			<div class="box rounded">
				@include('admin.brand.main.table')
			</div>
			<div class="callout alert text-center">برندهای بدون لوگو در سایت نمایش داده نمی‌شوند</div>
		</div>
	</div>
@endsection