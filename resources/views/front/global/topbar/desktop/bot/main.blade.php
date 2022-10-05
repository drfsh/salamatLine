<div class="bot">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell relative" >
				<div class="grid-x grid-padding-x">
					<div class="cell shrink">
						@include('front.global.topbar.desktop.bot.menu.main')
					</div>
					<div class="cell shrink">
						<ul class="static-menu">
							<li>
								<a href="/">صفحه اصلی</a>
							</li>
							<li>
								<a href="/">مجله سایت</a>
							</li>
							<li>
								<a href="{{route('OrdersTracking')}}">پیگیری سفارش</a>
							</li>
							<li>
								<a href="/about-us">درباره ما</a>
							</li>
							<li>
								<a href="/contact-us">تماس با ما</a>
							</li>
						</ul>
					</div>
				</div>
				<div class="grid-x grid-padding-x icon-btns" style="display: none">
					<div class="cell shrink">
						@guest
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
									<a href="{{route('login')}}" role="button" class="login btnh" href="{{route('login')}}">
										@include('icons.user')
										<span><a href="{{route('login')}}">ورود</a> / <a href="{{route('register')}}">ثبت نام</a>  </span>
									</a>
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
										<count-heart></count-heart>
									</a>
								</li>
								<li>
									<div class="item-mini-menu">
										<a class="btnh" href="{{route('profile')}}">
											@include('icons.user')
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
													@if(Auth::user()->hasRole('Admin'))
														<li>
															<a target="_blank" href="{{route('admin')}}">
																@include('icons.verify')
																پنل مدیریت سایت
															</a>
														</li>
													@endif
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
					</div>
				</div>
			</div>
		</div>
	</div>
</div>