@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('ProductHolder') }}
	<div class="double-gap"></div>
	<div class="gap"></div>
	{{ $data['product']->links() }}
	<div class="gap"></div>
	<div class="grid-container">
		<div class="grid-x small-up-2 medium-up-4 large-up-5">
			@foreach($data['product'] as $item)
				<div class="cell">@include('front.product.holder.item.main')</div>
			@endforeach
		</div>
	</div>
	<div class="double-gap"></div>
	{{ $data['product']->links() }}
	<div class="gap"></div>

@endsection