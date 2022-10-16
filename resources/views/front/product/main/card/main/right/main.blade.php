@if(!$data['product']->photos->isEmpty())
<div class="bbox">
	<div class="slider-wrapper _1">
		<div class="swiper product-slider-main">
			<div class="swiper-wrapper">
				@if($data['product']->large)
					<div class="swiper-slide zoom" style="background-image: url('{{$data['product']->large}}')" onmousemove="zoom(event)"><img src="{{$data['product']->large}}" alt=""></div>
				@endif

				@foreach($data['product']->photos as $item)
					<div  style="background-image: url('{{$item->large}}')" class="swiper-slide zoom" onmousemove="zoom(event)"><img src="{{$item->large}}" alt=""></div>
				@endforeach
			</div>
		</div>
	</div>
	<hr>
	<div class="slider-wrapper _2">
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
	<div class="product-slider zoom" onmousemove="zoom(event)" style="background-image: url('{{$data['product']->large}}')">
		<img src="{{$data['product']->large}}"  alt="">
	</div>
@endif
<script>
	function zoom(e) {
		var zoomer = e.currentTarget;
		e.offsetX ? offsetX = e.offsetX :
				offsetX = e.touches[0].pageX
		e.offsetY ? offsetY = e.offsetY :
				offsetY = e.touches[0].pageX

		x = offsetX/zoomer.offsetWidth*100
		y = offsetY/zoomer.offsetHeight*100
		zoomer.style.backgroundPosition = x+'% '+y+'% '
	}
</script>