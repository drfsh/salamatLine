@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('cart') }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				@if(Auth::check())
					<cart />
				@else
					<div class="double-gap"></div>
					@include('front.cart.guest')
				@endif
			</div>
		</div>
	</div>
@endsection
