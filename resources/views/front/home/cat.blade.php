@if($data['category'])
	<div class="grid-container">
		<div class="grid-x">
			@foreach($data['category'] as $item)
				<div class="cell">
					<div class="owl-box">
						<div class="center-title"><h3 class="heading"><a href="{{ route('category', $item->slug) }}">{{$item->name}}</a></h3></div>
						<div class="swiper owl-5" dir="rtl">
							<div class="swiper-wrapper">
								@foreach($item->product as $item)
									<div class="swiper-slide"><div class="cell">@include('front.product.holder.item.main')</div></div>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	</div>
@endif