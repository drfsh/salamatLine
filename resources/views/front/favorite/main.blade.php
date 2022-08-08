@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('favorite') }}
	<div class="double-gap"></div>
	<div class="grid-container">
	@if(!$products->isEmpty())
		<div class="grid-x small-up-2 medium-up-3 large-up-5">
			@foreach($products as $item)
				<div class="cell">
					@include('front.product.holder.item.main')
				</div>
			@endforeach
		</div>
	@else
		<div class="grid-x grid-padding-x">
			<div class="cell medium-6 medium-offset-3">
				<div class="gbox g">
					<div class="body">
						<p>در این قسمت می‌توانید لیستی از محصولات مورد علاقه‌ی خود را داشته باشید.<br>
پس از ورود به صفحه‌ی داخلیِ هر محصول بر روی افزودن به علاقه‌مندی‌ها کلیک نمایید.</p>
					</div>
				</div>
			</div>
		</div>
	@endif
</div>



@endsection