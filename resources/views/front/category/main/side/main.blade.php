@if(!$data['sub_cats']->isEmpty())
<div class="cat side-bar box3" data-closable>
	@if($agent->isMobile())
		<button class="close-button close-cat" aria-label="Close alert" type="button" data-close>
			<span aria-hidden="true">&times;</span>
		</button>
	@endif

	<div class="section">
		<div class="title">دسته‌بندی‌های  {{$data['category']->name}}</div>
		<div class="body">
			<ul class="first-level accordion-menu" data-accordion-menu>
				@foreach($data['sub_cats'] as $item)
					@if($item->children->isEmpty())
						<li>
							<a href="{{ route('category', $item->slug) }}">
								@include('icons.circle')
								<span>{{$item->name}}</span>
							</a>
						</li>
					@else
					<li>
						<a href="{{ route('category', $item->slug) }}"><i class="fas fa-chevron-left"></i><span>{{$item->name}}</span></a>
						<ul class="nested">
							@foreach($item->children as $item)
								<li>
									<a href="{{ route('category', $item->slug) }}">
										<span>{{$item->name}}</span>
									</a>
								</li>
							@endforeach
						</ul>
					</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif





