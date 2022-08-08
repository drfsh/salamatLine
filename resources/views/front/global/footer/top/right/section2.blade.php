<div class="title">مجموعه‌ها</div>
<ul>
	@foreach ($globalcollect as $item)
		<li>
			<a href="{{ route('collection', $item->slug) }}">
				<i class="fas fa-angle-left"></i>
				<span>{{$item->title}}</span>
			</a>
		</li>
	@endforeach
</ul>