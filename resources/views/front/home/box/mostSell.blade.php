<div class="box shadow radius mb2 px2 pt2">
	<div class="center-title"><h3 class="heading small bold">{{ __('home.mostSell') }}</h3></div>
	<div class="grid-x">
		@foreach($data['most_sell'] as $item)
			@if($item->product)
			<div class="cell">
				<a href="{{ route('product', $item['product']->slug) }}" class="horizontal" title="{{$item['product']->title}}">
					<div class="grid-x align-middle">
						<div class="cell shrink">
							<img src="{{$item['product']->tiny}}" alt="{{$item['product']->title}}" width="100">
						</div>
						<div class="cell auto">
							<div class="content">
								<div class="title sl">{{$item['product']->title}}</div>
									@if(!$item['product']->discount_price)
										<div class="price ho c">
											<div class="ma">{!! $item['product']->showing_price !!}</div>
											<div class="le">{{$item['product']->price_letter}}</div>
										</div>
									@else
										<div class="grid-x align-middle price">
											<div class="cell auto">
												{!! $item['product']->discount_price !!}
											</div>
											<div class="cell shrink"><div class="old">{!! $item['product']->showing_price !!}</div></div>
										</div>
									@endif

									@if(!$item['product']->discount->isEmpty())
										<div class="dis">{{$item['product']->discount[0]->percent}} تخفیف</div>
									@endif	
							</div>
						</div>
					</div>
				</a>
			</div>
			@endif
		@endforeach		
	</div>
</div>