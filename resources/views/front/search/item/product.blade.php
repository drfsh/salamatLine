<div class="cell">
	<div class="grid-x grid-padding-x small-up-2 medium-up-4">
		@foreach($modelSearchResults as $searchResult)
				<div class="cell">
					<a href="{{$searchResult->url}}" class="simple-item" title="{{$searchResult->title}}">
						<div class="cover">
							<img src="{{$searchResult->searchable->tiny}}" alt="{{$searchResult->title}}">
					{{-- 		@include('front.product.holder.item.assets.label')
							@if($item->subtitle)<div class="sub sl">{{$item->subtitle}}</div>@endif --}}
						</div>
						<div class="body">
							<div class="title sl">{{$searchResult->title}}</div>
							@if($searchResult->searchable->active)
								@if(!$searchResult->searchable->discount_price)
									<div class="price ho c">
										<div class="ma">{!! $searchResult->searchable->showing_price !!}</div>
										<div class="le">{{$searchResult->searchable->price_letter}}</div>
									</div>
								@else
									<div class="grid-x align-middle price">
										<div class="cell auto">
											{!! $searchResult->searchable->discount_price !!}
										</div>
										<div class="cell shrink"><div class="old">{!! $searchResult->searchable->showing_price !!}</div></div>
									</div>
								@endif
							@else
								<div class="price text-center"><small>ناموجود</small></div>
							@endif
						</div>
					</a>
				</div>
		@endforeach
	</div>
	<div class="gap"></div>
</div>