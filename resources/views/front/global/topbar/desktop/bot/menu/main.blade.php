<ul class="main">
	@foreach($categories as $item)
		@if(!$item->children()->isEmpty())
		<li class="dropdown">
			<a href="{{ route('category', $item->slug) }}">
				<i class="fas fa-chevron-down"></i>
				<span>{{$item->name}}</span>
			</a>
			@include('front.global.topbar.desktop.bot.menu.mega')
		</li>
		@else
			<li><a href="{{ route('category', $item->slug) }}">{{$item->name}}</a></li>
		@endif
	@endforeach
</ul>