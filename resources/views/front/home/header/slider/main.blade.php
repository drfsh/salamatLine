<div class="swiper main-slider" dir="rtl">
	<div class="swiper-wrapper">
		@foreach ($data['slider'] as $item)
			<div class="swiper-slide">@include('front.home.header.slider.item')</div>
		@endforeach
	</div>
	<!-- Add Pagination -->
	<div class="swiper-pagination"></div>
</div>