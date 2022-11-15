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

				<div class="title_b">محصولات

					<a class="button success" href="{{ route('product.create') }}"><i class="fas fa-plus"></i> ایجاد محصول</a>
				</div>
			<div class="double-gap"></div>
				<product-admin id="{{Auth::user()->id}}"></product-admin>
{{--				<product-holder></product-holder>--}}
		</div>
	</div>

@endsection
