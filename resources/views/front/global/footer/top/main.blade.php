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
				<a class="circle-hover">
					@include('icons.instagram')
				</a>
				<a  class="circle-hover">
					@include('icons.telegram')
				</a>
			</div>
			<div class="numbers">
				<div>
					<span>021</span>
					66462985
				</div>
				<div>
					<span>021</span>
					66462985
				</div>
			</div>
			<div class="email">
				info@salamatline.com
			</div>
			<div class="email">
				تهران، خیابان ولیعصر، بالاتر از جامی،پلاک ۱۰۷۰
			</div>
		</div>
	</div>
	<div class="co-12">
		<div class="info">
			<div class="title">درباره سلامت لاین</div>
			<p>سلامت لاین با هدفتبدیل شدن به یکی از توزیع کنندگان در ایران و منطقه فعالیت مینماید.
				این مجموعه قصد دارد تا به پیشتوانه کیفیت و قدمت برند های موجود در بازار و به متمایز نمودن کالا و  خدمات در بازار ایران و منطقه بپردازد.
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
						<a class="point" href="{{ route('singlepage', $item->slug) }}">
							<span>{{$item->title}}</span>
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<div class="co-12">
		<div class="info">
			<div class="title">عضویت در خبرنامه</div>
			<div class="news-letter">
				<news-letter></news-letter>
			</div>
		</div>
	</div>
</div>