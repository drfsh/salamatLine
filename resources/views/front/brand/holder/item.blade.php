<a href="{{ route('brand',$item->slug) }}" class="g-item">
	<div class="cover">
		<img class="logo" src="{{$item->tiny}}" alt="{{$item->title}}">
	</div>
	<div class="t text-center">
		{{$item->title}}
	</div>
</a>