<div>
    <ul class="pside">

        <li class="{{checkRoute('profile')}}">
            <a class="bg-l" href="{{ route('profile')}}">
                <i>
                    @include('icons.settings')
                </i>
                <span>پیشخوان</span>
            </a>
        </li>
        <li class="{{checkRoute('ProfileOrders')}}">
            <a class="bg-l" href="{{ route('ProfileOrders')}}">
                <i>
                    @include('icons.clipboard')
                </i>
                <span>سفارشات</span>
            </a>
        </li>
        <li class="{{checkRoute('MyFavorites')}}">
            <a class="bg-l" href="{{ route('MyFavorites')}}">
                <i>
                    @include('icons.heart')
                </i>
                <span>علاقه مندی ها</span>
            </a>
        </li>

        <li class="{{checkRoute('ProfileAddress')}}">
            <a class="bg-l" href="{{ route('ProfileAddress')}}">
                <i class="">
                    @include('icons.location')
                </i>
                <span>آدرس پستی شما</span>
            </a>
        </li>
        <li class="{{checkRoute('ProfileEdit')}}">
            <a class="bg-l" href="{{ route('ProfileEdit')}}">
                <i>
                    @include('icons.user-edit')
                </i>
                <span>جزییات حساب</span>
            </a>
        </li>
        <li class="{{checkRoute('OrdersTracking')}}">
            <a class="bg-l" href="{{ route('OrdersTracking')}}">
                <i>
                    @include('icons.search-more')
                </i>
                <span>پیگیری سفارش</span>
            </a>
        </li>
        <li class="{{checkRoute('Tickets')}}">
            <a class="bg-l" class="bg-l" href="{{ route('Tickets')}}">
                <i>
                    @include('icons.headphones')
                </i>
                <span>ارتباط با پشتیبانی</span>
            </a>
        </li>
        {{--        <li>--}}
        {{--            <a href="{{ route('ProfileOrders')}}">--}}
        {{--                <i class="fas fa-stopwatch"></i><span>سفارشاتِ فعال </span>--}}
        {{--                @if($unpaidinvoice > 0 && Auth::check())--}}
        {{--                    <span class="round noti">{{$unpaidinvoice}}</span>--}}
        {{--                @endif--}}
        {{--            </a>--}}
        {{--        </li>--}}
        {{--        <li>--}}
        {{--            <a href="{{ route('OrderHistory')}}">--}}
        {{--                <i class="fas fa-calendar-day"></i><span>سفارشات گذشته</span>--}}
        {{--            </a>--}}
        {{--        </li>--}}
    </ul>
    <div style="position: absolute;bottom: 5px;width: 100%;">
        <hr style="margin-top: 10px">
        <a  class="sidebar-exit"  href="{{ route('logout')}}"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i>
                @include('icons.exit')
            </i>
            <span>خروج از سیستم</span>
        </a>
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="hide">{{ csrf_field() }} </form>
    </div>

    <div style="height: 72px;"></div>
</div>

<?php
function checkRoute($name)
{
    if (request()->route()->getName() == $name)
        return 'active';
    else
        return '';
}
?>
