@extends('layouts.admin')

@section('NavItems')
	@include('admin.categories.NavItems')
@endsection

@section('content')
	<div class="grid-x grid-padding-x">
		<div class="cell">


			@if (Session::has('success'))
				<div class="cell callout success">
					{{ Session::get('success') }}
				</div>
				<div class="double-gap"></div>
			@endif
			@include('admin.product.main.card')
	{{-- 		<div class="box rounded">
				@include('admin.product.main.table')
			</div> --}}
			<a class="button success" href="{{ route('product.create') }}"><i class="fas fa-plus"></i> ایجاد محصول</a>
			<div class="double-gap"></div>
			<product-holder />
		</div>
	</div>
@endsection
