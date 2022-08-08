<div class="grid-container">
	<div class="grid-x grid-padding-x">

		<div class="cell">
			<div class="owl-box light ns px1 mb2 mt2">
				<div class="center-title"><h3 class="heading"><a href="{{ route('brandHolder')}}">برندها</a></h3></div>
				<div class="swiper owl-6" dir="rtl">
					<div class="swiper-wrapper">
						@foreach($data['brand'] as $item)
							<div class="swiper-slide"><div class="cell">@include('front.brand.holder.item')</div></div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="gap"></div>
		</div>

		<div class="cell">
			<div class="owl-box light mb2">
				<div class="center-title"><h3 class="heading"><a href="{{ route('countryHolder')}}">کشور سازنده</a></h3></div>
				<div class="swiper owl-6" dir="rtl">
					<div class="swiper-wrapper">
						@foreach($data['country'] as $item)
							<div class="swiper-slide"><div class="cell">@include('front.country.holder.item')</div></div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="double-gap"></div>