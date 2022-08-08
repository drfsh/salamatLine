<div class="owl-box no-bg">
	<div class="double-gap"></div>
	<div class="center-title"><h3 class="heading"><a href="{{ route('brandHolder') }}">سایر برندها</a></h3></div>
	<div class="swiper owl-6" dir="rtl">
		<div class="swiper-wrapper">
			@foreach($data['other'] as $item)
				<div class="swiper-slide">
					@include('front.brand.holder.item')
				</div>
			@endforeach
		</div>
	</div>
</div>
<div class="gap"></div>