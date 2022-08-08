@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('ProductHolder') }}
	<div class="double-gap"></div>
	{{ $data['products']->links() }}
	<div class="grid-container">
		<div class="grid-x small-up-2 medium-up-4 large-up-5">
			@foreach($data['products'] as $item)
				<div class="cell">@include('front.product.holder.item.main')</div>
			@endforeach
		</div>
	</div>
	<div class="double-gap"></div>
	{{ $data['products']->links() }}
	<div class="double-gap"></div>
@endsection