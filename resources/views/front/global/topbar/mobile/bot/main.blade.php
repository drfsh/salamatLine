<div class="bot">
	<div class="grid-x align-middle">
		<div class="cell auto">
			@include('front.global.topbar.desktop.top.search')
		</div>
		<div class="cell shrink">
			<ul class="holder header-left-btns">
				@guest
					<li><cart-num></cart-num></li>
					<li>
						<a href="{{ route('MyFavorites') }}" aria-label="My Favorites" class="btnh">
							@include('icons.heart')
						</a>
					</li>
					<li><a href="{{ route('login') }}" class="btnh" aria-label="Login"><i class="far fa-user"></i></a></li>
				@else
					<li><cart-num></cart-num></li>
					<li>
						<a href="{{ route('MyFavorites') }}" aria-label="My Favorites" class="btnh">
							@include('icons.heart')
						</a>
					</li>
					<li><a class="btnh" href="{{ route('profile') }}" aria-label="My Profile">
							@include('icons.user')
						@if($unpaidinvoice > 0 && Auth::check())
							<span class="round noti">{{$unpaidinvoice}}</span>
						@endif
					</a></li>
				@endguest
			</ul>
		</div>
	</div>
</div>