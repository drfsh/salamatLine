<div class="banner">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				@foreach ($data['banner'] as $item)
					@if($item->pos == 5)@include('front.home.banner.item')</a>@endif
				@endforeach
				<div class="double-gap"></div>
			</div>
			@foreach ($data['banner'] as $item)
				@if($item->pos == 6)
					<div class="cell medium-6">
						@include('front.home.banner.item')
						<div class="double-gap show-for-small-only"></div>
					</div>
				@endif
				@if($item->pos == 7)
					<div class="cell medium-6">
						@include('front.home.banner.item')
					</div>
				@endif
			@endforeach
		</div>
	</div>
</div>