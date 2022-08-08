@extends('layouts.profile')

@section('BreadCrumb')
	{{ Breadcrumbs::render('History') }}
@endsection

@section('content')
	<div class="grid-x grid-padding-x">

		<div class="cell">
			@if($errors->any())
				<div class="cell">
					<div class="callout success">
						{{$errors->first()}}
					</div>
				</div>
			@endif
		</div>

		@forelse($data['invoice'] as $item)
			<div class="cell">
				@include('profile.orders.item.main')
			</div>
		@empty
			<div class="cell">
				<div class="callout">آرشیو سفارشات گذشته خالی است</div>
			</div>
		@endforelse
		<div class="cell">
			<nav aria-label="Pagination">
				{!! $data['invoice']->links(); !!}
			</nav>
		</div>
	</div>
@endsection