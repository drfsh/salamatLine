@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('BrandHolder') }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<div class="center-title"><h1 class="heading">محصولات بر اساس کشور سازنده</h1></div>
				{{ $data['brand']->links() }}
			</div>
			@foreach($data['brand'] as $item)
				<div class="cell small-6 medium-4 large-3">
					@include('front.brand.holder.item')
				</div>
			@endforeach
			<div class="cell">
				<div class="double-gap"></div>
				{{ $data['brand']->links() }}
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection