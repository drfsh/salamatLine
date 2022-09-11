<div class="banner home-banner2">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				@foreach ($data['banner'] as $item)
					@if($item->pos == 5)@include('front.home.banner.item')</a>@endif
				@endforeach
			</div>
		</div>
	</div>
</div>
