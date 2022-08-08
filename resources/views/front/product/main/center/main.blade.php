<div class="gbox g">
	<div class="head">
		<h1>{{$data['product']->title}}@if($data['product']->subtitle)<small> ({{$data['product']->subtitle}})</small>@endif</h1>
	</div>
	<div class="body @if(!$data['product']->active)out-of-stock @endif">
		@include('front.product.main.center.cart')
	</div>
</div>

<div class="meta-box">
	<ul>
		<li>
			<span>دسته‌بندی</span>
			@foreach($data['product']->categories as $item)
				<a href="{{ route('category', $item->slug) }}">{{$item->name}}</a>@if(!$loop->last)، @endif
			@endforeach
		</li>
		@if($data['product']->brand_id)
			<li><span>برند</span><a href="{{ route('brand', $data['product']->brand->slug) }}">{{$data['product']->brand->title}}</a></li>
		@endif
		@if($data['product']->country_id)
			<li><span>کشور سازنده</span><a href="{{ route('country', $data['product']->country->slug) }}">{{$data['product']->country->title}}</a></li>
		@endif
	</ul>
</div>


@include('front.product.main.center.badge')