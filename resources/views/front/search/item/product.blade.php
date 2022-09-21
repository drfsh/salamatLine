<div class="cell">
	<div class="grid-x grid-padding-x small-up-2  medium-up-4">
		@foreach($modelSearchResults as $item)
			<?php $item = $item->searchable ?>
		<div class="cell">
			@include('front.product.holder.item.main')
		</div>
		@endforeach
	</div>
	<div class="gap"></div>
</div>