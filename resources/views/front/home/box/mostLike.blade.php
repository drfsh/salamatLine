<div class="box shadow radius mb2 px2 pt2">
	<div class="center-title"><h3 class="heading small bold">{{ __('home.mostPopular') }}</h3></div>
	<div class="grid-x">
		@foreach($data['most_like'] as $item)
			<div class="cell">@include('front.product.holder.item.horizontal')</div>
		@endforeach		
	</div>
</div>