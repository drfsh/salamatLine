@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('Country',$data['country']) }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<div class="center-title"><h1 class="heading">محصولات کشور  <b>{{$data['country']->title}}</b><img class="mr1" src="{{$data['country']->image}}" width="25" alt=""></h1></div>
				{{ $data['product']->links() }}
				<div class="gap"></div>
			</div>
			@forelse($data['product'] as $item)
				<div class="cell small-6 medium-4 large-3">@include('front.product.holder.item.main')</div>
				@empty
				<div class="cell">
					<div class="callout">هیچ محصولی برای کشور {{$data['country']->title}} ثبت نشده است.</div>
				</div>
			@endforelse
			<div class="cell">
				{{ $data['product']->links() }}
			</div>
			<div class="cell">
				<div class="owl-box no-bg">
					<div class="double-gap"></div>
					<div class="center-title"><h3 class="heading"><a href="{{ route('countryHolder') }}">سایر کشورها</a></h3></div>
					<div class="swiper owl-6" dir="rtl">
						<div class="swiper-wrapper">
							@foreach($data['other'] as $item)
								<div class="swiper-slide">
									@include('front.country.holder.item')
								</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="gap"></div>
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection