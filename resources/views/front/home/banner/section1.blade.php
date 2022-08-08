<div class="banner">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<div class="swiper owl-3" dir="rtl">
					<div class="swiper-wrapper">
						@foreach ($data['banner'] as $item)
							@if($item->pos == 1)
								<div class="swiper-slide">@include('front.home.banner.item')</div>
							@endif
							@if($item->pos == 2)
								<div class="swiper-slide">@include('front.home.banner.item')</div>
							@endif
							@if($item->pos == 3)
								<div class="swiper-slide">@include('front.home.banner.item')</div>
							@endif
							@if($item->pos == 4)
								<div class="swiper-slide">@include('front.home.banner.item')</div>
							@endif
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>