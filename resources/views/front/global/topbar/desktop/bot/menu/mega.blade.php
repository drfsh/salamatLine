<div class="mega " id="main-c-{{$item->id}}">
	<ul>
		@foreach($item->children() as $item2)
		@if($item2->children()->isEmpty())
			<li><a href="{{ route('category', $item2->slug) }}"><span>{{$item2->name}}</span></a></li>
		@else
			<li><a href="{{ route('category', $item2->slug) }}">
				<span>{{$item2->name}}</span></a>
				<ul>
					@foreach($item2->children() as $item3)
						<li><a href="{{ route('category', $item3->slug) }}"><span>{{$item3->name}}</span></a></li>
					@endforeach
				</ul>
			</li>
		@endif
		@endforeach
	</ul>
</div>