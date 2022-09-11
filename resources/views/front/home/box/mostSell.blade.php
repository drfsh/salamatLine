<div class="box shadow radius mb2 px2 pt2">
	<div class="center-title"><h3 class="heading small bold">{{ __('home.mostSell') }}</h3></div>
	<div class="grid-x">
		@foreach($data['most_sell'] as $item)
			@if($item->product)
                <?php $item = $item->product; ?>
                <div class="cell">@include('front.product.holder.item.horizontal')</div>
			@endif
		@endforeach
	</div>
</div>
