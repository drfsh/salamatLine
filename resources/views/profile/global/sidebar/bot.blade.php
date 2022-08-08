<div>
    <ul class="pside">

        <li>
            <a href="{{ route('ProfileEdit')}}">
                <i>
                    @include('icons.settings')
                </i>
                <span>پیشخوان</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ProfileEdit')}}">
                <i>
					@include('icons.clipboard')
				</i>
                <span>سفارشات</span>
            </a>
        </li>
		<li>
            <a href="{{ route('ProfileEdit')}}">
                <i>
					@include('icons.heart')
				</i>
                <span>علاقه مندی ها</span>
            </a>
        </li>

        <li class="active">
            <a href="{{ route('ProfileAddress')}}">
                <i class="">
					@include('icons.location')
                </i>
                <span>آدرس پستی شما</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ProfileEdit')}}">
                <i>
					@include('icons.user-edit')
				</i>
				<span>جزییات حساب</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ProfileEdit')}}">
                <i>
					@include('icons.search-more')
				</i>
				<span>پیگیری سفارش</span>
            </a>
        </li>
        <li>
            <a href="{{ route('ProfileEdit')}}">
                <i>
					@include('icons.headphones')
				</i>
				<span>ارتباط با پشتیبانی</span>
            </a>
        </li>
        <li style="position: absolute;bottom: 5px;">
            <a href="{{ route('ProfileEdit')}}">
                <i>
					@include('icons.exit')
				</i>
				<span>خروج از سیستم</span>
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
</div>
<div class="double-gap"></div>