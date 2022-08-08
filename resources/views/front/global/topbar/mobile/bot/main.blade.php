<div class="bot">
	<div class="grid-x align-middle">
		<div class="cell auto">
			@include('front.global.topbar.desktop.top.search')
		</div>
		<div class="cell shrink">
			<ul class="holder">
				@guest
					<li><a href="{{ route('login') }}" aria-label="Login"><i class="far fa-user"></i></a></li>
					<li><menu-cart aria-label="Cart" :auth="false" /></li>
				@else
					<li><a href="{{ route('MyFavorites') }}" aria-label="My Favorites"><i class="fas fa-heart"></i></a></li>
					<li><a class="cart" href="{{ route('profile') }}" aria-label="My Profile"><i class="fas fa-user"></i>
						@if($unpaidinvoice > 0 && Auth::check())
							<span class="round noti">{{$unpaidinvoice}}</span>
						@endif
					</a></li>
					<li><menu-cart aria-label="Cart" :auth="true" /></li>
				@endguest
			</ul>
		</div>
	</div>
</div>