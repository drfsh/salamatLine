<a href="{{ route('country',$item->slug) }}" title="{{$item->title}} - {{$item->slug}}" class="g-item">
	@if($item->image)
		<img class="zoom" src="{{$item->image}}" alt="{{$item->title}}">
	@endif
</a>