@guest
	<menu-cart :auth="false" ></menu-cart>

@else
{{--	<menu-cart :auth="true" ></menu-cart>--}}
	<ul class="header-left-btns">
		<li>
			<a href="{{route('cart')}}">
				@include('icons.basket2')
				<cart-num></cart-num>
			</a>
		</li>
		<li>
			<a href="{{route('MyFavorites')}}">
				@include('icons.heart')
			</a>
		</li>
		<li>
			<a class="login" href="{{route('login')}}">
				@include('icons.user')
				<span>ورود / ثبت نام</span>
			</a>
		</li>
	</ul>
@endguest