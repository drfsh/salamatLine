@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('ProductHolder') }}
	<div class="double-gap"></div>
	{{ $data['product']->links() }}
	<div class="gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<div class="center-title"><h1 class="heading">شرکت {{$data['company']->title}}</h1></div>
				<div class="gap"></div>
			</div>
			@forelse($data['product'] as $item)
				<div class="cell small-6 medium-4 large-3">@include('front.product.holder.item.main')</div>
			@empty
				<div class="cell">
					<div class="callout">هیچ محصولی برای شرکت  <b>{{$data['company']->title}}</b> ثبت نشده است.</div>
				</div>			
			@endforelse
			<div class="cell">
				<div class="owl-box no-bg">
					<div class="double-gap"></div>
					<div class="center-title"><h3 class="heading"><a href="{{ route('companyHolder') }}">سایر شرکت‌ها</a></h3></div>
					<div class="swiper owl-6" dir="rtl">
						<div class="swiper-wrapper">
							@foreach($data['other'] as $item)
								<div class="swiper-slide"><a href="{{ route('company', $item->slug) }}" class="button expanded">{{$item->title}}</a></div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="gap"></div>
			</div>
		</div>
	</div>
	{{ $data['product']->links() }}
	<div class="double-gap"></div>
@endsection