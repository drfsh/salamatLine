<div class="bot">
    <div class="grid-x align-middle">
        <div class="cell auto">
            @include('front.global.topbar.desktop.top.search')
        </div>
        <div class="cell shrink">
            <ul class="holder header-left-btns">
                @guest
                    <li>
                        <cart-num></cart-num>
                    </li>
                    <li>
                        <a href="{{ route('MyFavorites') }}" aria-label="My Favorites" class="btnh">
                            @include('icons.heart')
                        </a>
                    </li>
                    <li><a href="{{ route('login') }}" class="btnh" aria-label="Login"><i class="far fa-user"></i></a>
                    </li>
                @else
                    <li>
                        <cart-num></cart-num>
                    </li>
                    <li>
                        <a href="{{ route('MyFavorites') }}" aria-label="My Favorites" class="btnh">
                            @include('icons.heart')
                        </a>
                    </li>
                    <li>
                        <div class="item-mini-menu">
                            <span class="click clposis1"></span>
                            <a class="btnh" aria-label="My Profile">
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
                                            <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                                  class="hide">{{ csrf_field() }} </form>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    </li>
                @endguest
            </ul>
        </div>
    </div>
</div>
