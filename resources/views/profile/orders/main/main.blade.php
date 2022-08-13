@extends('layouts.profile')

@section('content')
	<div class="grid-x grid-padding-x ">

        <div class="cell">
            <div class=" box2">
                <div class="title">سفارشات شما</div>
                <div>
                    <ul class="btns-viewpager">
                        <li class="item">
                            <div>
                                <span class="name">جاری</span>
                                <span class="count">0</span>
                            </div>
                        </li>
                        <li class="item active">
                            <div>
                                <span class="name">در انتظار برسی</span>
                                <span class="count">0</span>
                            </div>
                        </li>
                        <li class="item" >
                            <div>
                                <span class="name">تحویل داده شده</span>
                                <span class="count">1</span>
                            </div>
                        </li>
                        <li class="item">
                            <div>
                                <span class="name">در انتظار پرداخت</span>
                                <span class="count">1</span>
                            </div>
                        </li>
                        <li class="item">
                            <div>
                                <span class="name">لغو شده</span>
                                <span class="count">1</span>
                            </div>
                        </li>
                    </ul>
                </div>
                <div style="padding: 0 22px 22px;">
                    <div class="bbox min-h-500">

                        <div class="noting-orders">
                            <img src="{{asset('img/profile/order-empty.svg')}}">
                            <span>هنوز هیچ سفارشی ندادید</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{--		<div class="cell">--}}
{{--			@if($errors->any())--}}
{{--				<div class="cell">--}}
{{--					<div class="callout success">--}}
{{--						{{$errors->first()}}--}}
{{--					</div>--}}
{{--				</div>--}}
{{--			@endif--}}
{{--		</div>--}}

{{--		@forelse($data['invoice'] as $item)--}}
{{--			<div class="cell">--}}
{{--				@include('profile.orders.item.main')--}}
{{--			</div>--}}
{{--		@empty--}}
{{--			<div class="cell">--}}
{{--				<div class="callout">هیچ سفارش فعالی وجود ندارد.</div>--}}
{{--			</div>--}}
{{--		@endforelse--}}
	</div>
@endsection
