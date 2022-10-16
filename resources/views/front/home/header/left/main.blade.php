<div class="grid-x grid-padding-x">
	@foreach($data['subslider'] as $item)
		<div class="cell">
			<a class="item" href="{{$item->link}}">
				<img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
			</a>
			<div class="double-gap"></div>
		</div>
	@endforeach
</div>