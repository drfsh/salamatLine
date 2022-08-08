<div class="owl-box no-bg">
	<div class="center-title"><h3 class="heading">محصولات مرتبط</h3></div>
	<div class="swiper owl-5" dir="rtl">
		<div class="swiper-wrapper">
			@foreach($data['related'] as $item)
				<div class="swiper-slide"><div class="cell">@include('front.product.holder.item.main')</div></div>
			@endforeach
		</div>
	</div>
</div>