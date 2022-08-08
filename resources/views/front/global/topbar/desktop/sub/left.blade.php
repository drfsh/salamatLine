<ul>
	@guest
		<li>
			<a href="{{ route('login') }}">
				<i class="fas fa-user-check"></i>
				{{ __('auth.LoginTitle') }}
			</a>
		</li>
		<li>
			<a href="{{ route('register') }}">
				<i class="fas fa-user-plus"></i>
				{{ __('auth.RegisterTitle') }}
			</a>
		</li>
	@else
		@if(Auth::user()->hasRole('Admin'))
			<li>
				<a href="{{ route('admin') }}" target="_blank">
					<i class="fas fa-unlock"></i>
					مدیریت
				</a>
			</li>	
		@endif
		<li>
			<a href="{{ route('profile') }}">
				<i class="fas fa-user-cog"></i>
				{{ Auth::user()->name }}
			</a>
		</li>
		<li>
			<a href="{{ route('ProfileOrders') }}">
				<i class="fas fa-folder-open"></i>
				سفارشات
				@if($unpaidinvoice > 0 && Auth::check())
					<span class="round noti">{{$unpaidinvoice}}</span>
				@endif
			</a>
		</li>
		<li>
			<a href="{{ route('MyFavorites') }}">
				<i class="fas fa-heart"></i>
				علاقه‌مندی‌ها
			</a>
		</li>
{{-- 		<li>
			<a onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
		</li> --}}
	@endif
</ul>
{{-- <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
    @csrf
</form> --}}