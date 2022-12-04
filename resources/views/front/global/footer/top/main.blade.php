{{--<div class="top">--}}
{{--	<div class="grid-container">--}}
{{--		<div class="grid-x grid-padding-x align-middle">--}}
{{--			<div class="cell medium-6 large-5">--}}
{{--				@include('front.global.footer.top.right.main')--}}
{{--			</div>--}}
{{--			<div class="cell medium-6 large-7">--}}
{{--				@include('front.global.footer.top.left.main')--}}
{{--			</div>--}}
{{--		</div>--}}
{{--	</div>--}}
{{--</div>--}}

<div class="top">
    <div class="co-12" style="padding-right: 0;">
        <div class="contact-us">
            @include('front.global.logo')
            <div class="accounts">
                <a class="">
                    @include('icons.instagram')
                </a>
                <a class="">
                    @include('icons.telegram')
                </a>
            </div>
            <div class="numbers">
                <a href="tel:{{$globalcontact[0]->phone1}}">
                    <div>
                        <span>021</span>
                        {{explode('021',$globalcontact[0]->phone1)[1]}}
                    </div>
                </a>
                @if($globalcontact[0]->phone2)
                    <div>
                        {{$globalcontact[0]->phone2}}
                    </div>
                @endif
            </div>
            <div class="email">
                {{$globalcontact[0]->email}}
            </div>
            <div class="email">
                {{$globalcontact[0]->address}}
            </div>
            <a target="_blank" class="mapurl" href="{{$globalcontact[0]->mapurl}}">
                <img src="{{asset('img/googlemaps.png')}}"/>
                <span>GOOGLE </span>
                <span>MAP</span>
            </a>
        </div>
    </div>
    <div class="co-12">
        <div class="info">
            <div class="title">درباره سلامت لاین</div>
            <p>سلامت لاین با هدفتبدیل شدن به یکی از توزیع کنندگان در ایران و منطقه فعالیت مینماید.
                این مجموعه قصد دارد تا به پیشتوانه کیفیت و قدمت برند های موجود در بازار و به متمایز نمودن کالا و خدمات
                در بازار ایران و منطقه بپردازد.
            </p>

            <a class="more">
                از ما بیشتر بدانید...
                @include('icons.bulb')
            </a>
        </div>
    </div>
    <div class="co-12">
        <div class="info">
            <div class="title">دسترسی آسان</div>
            <ul>
                @foreach ($globalpages as $item)
                    <li>
                        <a class="point"
                           @if($item->slug!=='about-us' && $item->slug!=='contact-us') href="{{ route('singlepage', $item->slug) }}"
                           @else href="/{{$item->slug}}" @endif>
                            <span>{{$item->title}}</span>
                        </a>
                    </li>
                @endforeach
                <li>
                    <a class="point" href="/help">
                        <span>آموزش خرید</span>
                    </a>
                </li>
                <li>
                    <a class="point" href="/faq">
                        <span>سوالات متداول</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div style="opacity: 0;" class="co-12">
        <div class="info">
            <div class="title">عضویت در خبرنامه</div>
            <div class="news-letter">
                <news-letter></news-letter>
            </div>
        </div>
    </div>
</div>
