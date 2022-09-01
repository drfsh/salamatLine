@extends('layouts.front')

@section('meta')
	<meta name="product_id" content="{{$data['product']->id}}">
	<meta name="product_price" content="{{$data['torob']['product_price']}}">
	<meta name="product_old_price" content="{{$data['torob']['product_price']}}">
	<meta name="availability" content="{{$data['torob']['availability']}}">
@endsection

@section('content')
	<div class="double-gap"></div>
	<div class="grid-container product-page">
		{{ Breadcrumbs::render('product',$data['product']) }}
		<div class="grid-x grid-padding-x">
			<div class="cell medium-12 large-12">
				@include('front.product.main.card.card')
			</div>

			<div class="cell">
				@include('front.product.main.icons.main')
			</div>

{{--			<div class="cell medium-8 large-7">--}}
{{--				<div class="grid-x grid-padding-x">--}}
{{--					<div class="cell medium-6 large-6">--}}
{{--						@include('front.product.main.card.main.center.main')--}}
{{--					</div>--}}
{{--					<div class="cell medium-6 large-6">--}}
{{--						@include('front.product.main.left.main')--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			</div>--}}

			<div class="cell">
				@include('front.product.main.tabs.main')
				@include('front.product.main.suggest.main')
{{--				@include('front.product.main.suggest.collection')--}}

			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection
