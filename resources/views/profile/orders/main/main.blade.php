@extends('layouts.profile')

@section('BreadCrumb')
	{{ Breadcrumbs::render('Orders') }}
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
				<div class="callout">هیچ سفارش فعالی وجود ندارد.</div>
			</div>
		@endforelse
	</div>
@endsection