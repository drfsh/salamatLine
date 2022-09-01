@if(!$data['product']->photos->isEmpty())
<div class="bbox">
	<div class="slider-wrapper">
		<div class="swiper product-slider-main">
			<div class="swiper-wrapper">
				@if($data['product']->large)
					<div class="swiper-slide"><img src="{{$data['product']->large}}" alt=""></div>
				@endif

				@foreach($data['product']->photos as $item)
					<div class="swiper-slide"><img src="{{$item->large}}" alt=""></div>
				@endforeach
			</div>
		</div>
	</div>
	<hr>
	<div class="slider-wrapper">
		<div class="swiper product-slider-thumb">
			<div class="swiper-wrapper">
				@if($data['product']->tiny)
					<div class="swiper-slide"><img src="{{$data['product']->tiny}}" alt=""></div>
				@endif
				@foreach($data['product']->photos as $item)
					<div class="swiper-slide"><img src="{{$item->large}}" alt=""></div>
				@endforeach
			</div>
		</div>
	</div>
</div>

@else
	<div class="product-slider">
		<img src="{{$data['product']->large}}" alt="">
	</div>
@endif
