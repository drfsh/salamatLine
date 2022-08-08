<a href="{{ route('product', $item->slug) }}" class="horizontal  @if(!$item->active)out-of-stock @endif" title="{{$item->title}}">
	<div class="grid-x align-middle">
		<div class="cell shrink">
			<img src="{{$item->tiny}}" alt="{{$item->title}}" width="100">
		</div>
		<div class="cell auto">
			<div class="content">
				<div class="title sl">{{$item->title}}</div>
{{-- 				<div class="price sl ho">
					<div class="ma">{!! $item->showing_price !!}</div>
					<div class="le">{{$item->price_letter}}</div>
				</div> --}}
				@include('front.product.holder.item.assets.price')
				@if(!$item->discount->isEmpty())
					<div class="dis">{{$item->discount[0]->percent}} تخفیف</div>
				@endif	
			</div>
		</div>
	</div>
</a>