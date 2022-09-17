@guest
	<ul class="header-left-btns">
		<li>
				<cart-num></cart-num>
		</li>

		<li>
			<div role="button" class="login btnh" href="{{route('login')}}">
				@include('icons.user')
				<span><a href="{{route('login')}}">ورود</a> / <a href="{{route('register')}}">ثبت نام</a>  </span>
			</div>
		</li>
	</ul>
@else
{{--	<menu-cart :auth="true" ></menu-cart>--}}
	<ul class="header-left-btns">
		<li>
            <cart-num></cart-num>
        </li>
		<li>
			<a class="btnh" href="{{route('MyFavorites')}}">
				@include('icons.heart')
			</a>
		</li>
		<li>
            <div class="item-mini-menu">
                <a class="login btnh" href="{{route('profile')}}">
                    @include('icons.user')
                    <span>پروفایل</span>
                </a>
                <div style="width: 225px;" class="mini-menu-3">

                    <div class="widget_shopping_cart_content">

                        <ul class="items">
                            <li>
                                <a href="{{route('profile')}}">
                                    @include('icons.menu')
                                    پنل کاربری
                                </a>
                            </li>
                            <li>
                                <a href="{{route('ProfileEdit')}}">
                                    @include('icons.user-edit')
                                    ویرایش حساب کاربری
                                </a>
                            </li>
                            <li>
                                <a href="{{route('ProfileOrders')}}">
                                    @include('icons.basket')
                                    سفارش های شما
                                </a>
                            </li>
                            <li>
                                <a href="{{route('MyFavorites')}}">
                                    @include('icons.heart')
                                    علاقه مندی های شما
                                </a>
                            </li>
                            <li>
                                <a onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                   href="{{ route('logout')}}">
                                    @include('icons.exit')
                                    خروج از سایت
                                </a>
                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">{{ csrf_field() }} </form>

                            </li>
                        </ul>

                    </div>
                </div>
            </div>
		</li>
	</ul>
@endguest
