<a href="{{ route('collection',$item->slug) }}" class="g-item">
	<div class="grid-x align-middle">
		<div class="cell auto t text-center sl">{{$item->title}}</div>
		<div class="cell footer"><small>تعداد محصول: {{$item->products->count()}}</small></div>
	</div>
</a>