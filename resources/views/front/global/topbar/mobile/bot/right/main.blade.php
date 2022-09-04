<div class="off-canvas position-right" id="offCanvasRight" data-off-canvas>
	<ul class="vertical menu drilldown" data-drilldown data-back-button='<li class="js-drilldown-back"><a href="#" rel="nofollow">بازگشت</a></li>'>
		@foreach($categories as $item)
		@if($item->children->isEmpty())
			<li><a href="{{ route('category', $item->slug) }}">{{$item->name}}</a></li>
		@else
			<li>
				<a href="#">{{$item->name}}</a>
				<ul class="menu vertical nested">
					<li class="all"><a href="{{ route('category', $item->slug) }}">همه موارد این دسته</a></li>
					@foreach($item->children as $item2)
						@if($item2->children->isEmpty())
							<li><a href="{{ route('category', $item2->slug) }}">{{$item2->name}}</a></li>
						@else
							<li>
								<a href="#">{{$item2->name}}</a>
								<ul class="menu vertical nested">
									<li class="all g"><a href="{{ route('category', $item2->slug) }}">همه موارد این دسته</a></li>
									@foreach($item2->children as $item3)
										<li><a href="{{ route('category', $item3->slug) }}"><span>{{$item3->name}}</span></a></li>
									@endforeach									
								</ul>
							</li>
						@endif
					@endforeach
				</ul>
			</li>
		@endif
		@endforeach
	</ul>
</div>