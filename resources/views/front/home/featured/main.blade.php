<div class="grid-container" style="margin-top: 30px;">
	<div class="grid-x">
		<div class="cell">
			<div class="owl-box">
				<div class="center-title"><h3 class="heading"><a href="{{ route('featured')}}">{{ __('home.featured') }}</a></h3></div>
				<div class="swiper owl-5" dir="rtl">
					<div class="swiper-wrapper">
						@foreach($data['featured'] as $item)
							<div class="swiper-slide">@include('front.product.holder.item.main')</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
