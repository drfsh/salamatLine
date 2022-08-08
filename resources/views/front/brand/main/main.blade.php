@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('Brand',$data['brand']) }}
	<div class="double-gap"></div>
	{{ $data['product']->links() }}
	<div class="gap"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<div class="center-title"><h1 class="heading">برند {{$data['brand']->title}}</h1></div>
				<div class="gap"></div>
			</div>
			@forelse($data['product'] as $item)
				<div class="cell small-6 medium-4 large-3">@include('front.product.holder.item.main')</div>
			@empty
				<div class="cell">
					<div class="callout">هیچ محصولی برای برند {{$data['brand']->title}} ثبت نشده است.</div>
				</div>			
			@endforelse
			<div class="cell">
				@include('front.brand.main.other')
			</div>
		</div>
	</div>
	{{ $data['product']->links() }}
	<div class="double-gap"></div>
@endsection