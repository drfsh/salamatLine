@if($item->active)
	@if(!$item->discount_price)
		<div class="price ho c">
			<div class="ma">{!! $item->showing_price !!}</div>
			<div class="le">{{$item->price_letter}}</div>
		</div>
	@else
		<div class="grid-x align-middle price">
			<div class="cell auto">
				{!! $item->discount_price !!}
			</div>
			<div class="cell shrink"><div class="old">{!! $item->showing_price !!}</div></div>
		</div>
	@endif
@else
<div class="price text-center"><small>ناموجود</small></div>
@endif