<div class="owl-box no-bg">
	<div class="center-title"><h3 class="heading"><a href="{{ route('collectionHolder') }}">دیگر مجموعه‌ها</a></h3></div>
	<div class="swiper owl-5" dir="rtl">
		<div class="swiper-wrapper">
			@foreach($data['other'] as $item)
				<div class="swiper-slide">@include('front.collection.holder.item')</div>
			@endforeach
		</div>
	</div>
</div>