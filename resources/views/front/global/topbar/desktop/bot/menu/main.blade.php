<div id="menu-category">
	<div role="button" class="menu-category" >
		<span>@include('icons.menu')</span>
		<span>دسته بندی محصولات</span>
		<span>@include('icons.chevron-down')</span>
	</div>
	<div id="menu-item-category" style="display: none">
		<ul class="main">
			@foreach($categories as $key => $item)
				@if(!$item->children()->isEmpty())
					<li>
						<a class="main-item-category" data-id="main-c-{{$item->id}}"  href="{{ route('category', $item->slug) }}">
							<span>{{$item->name}}</span>
						</a>
					</li>
				@else
					<li><a href="{{ route('category', $item->slug) }}">{{$item->name}}</a></li>
				@endif
			@endforeach
		</ul>
		<ul class="child">
			@foreach($categories as $key => $item)
				@if(!$item->children()->isEmpty())
						@include('front.global.topbar.desktop.bot.menu.mega')
				@endif
			@endforeach
		</ul>
	</div>
</div>
