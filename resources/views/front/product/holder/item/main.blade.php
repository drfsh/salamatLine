<a href="{{ route('product', $item->slug) }}" class="simple-item @if(!$item->active)out-of-stock @endif" title="{{$item->title}}">
	<div class="cover">
		<img src="{{$item->tiny}}" alt="{{$item->title}}">
		@include('front.product.holder.item.assets.label')
		@if($item->subtitle)<div class="sub sl">{{$item->subtitle}}</div>@endif
	</div>
	<div class="body">
		<div class="title sl">{{$item->title}}</div>
		@include('front.product.holder.item.assets.price')		
	</div>
</a>