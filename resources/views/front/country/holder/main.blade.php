@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('CountryHolder') }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<div class="center-title"><h1 class="heading">محصولات بر اساس کشور سازنده</h1></div>
				{{ $data['country']->links() }}
				<div class="gap"></div>
			</div>
			@foreach($data['country'] as $item)
				<div class="cell small-6 medium-4 large-3">
					@include('front.country.holder.item')
				</div>
			@endforeach
			<div class="cell">
				{{ $data['country']->links() }}
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection