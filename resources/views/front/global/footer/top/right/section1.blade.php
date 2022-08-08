<div class="title">دسترسی سریع</div>
<ul>
	@foreach ($globalpages as $item)
		<li>
			<a href="{{ route('singlepage', $item->slug) }}">
				<i class="fas fa-angle-left"></i>
				<span>{{$item->title}}</span>
			</a>
		</li>
	@endforeach
</ul>