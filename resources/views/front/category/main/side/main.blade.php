@if(!$data['sub_cats']->isEmpty())
<div class="cat side-bar box3" data-closable>
	@if($agent->isMobile())
		<button class="close-button close-cat" aria-label="Close alert" type="button" data-close>
			<span aria-hidden="true">&times;</span>
		</button>
	@endif

	<div class="section">
		<div class="title">دسته‌بندی‌های  {{$data['category']->name}}</div>
		<div class="body">
			<ul class="first-level accordion-menu" data-accordion-menu>
				@foreach($data['sub_cats'] as $item)
					@if($item->children->isEmpty())
						<li>
							<a href="{{ route('category', $item->slug) }}">
								@include('icons.circle')
								<span>{{$item->name}}</span>
							</a>
						</li>
					@else
					<li>
						<a href="{{ route('category', $item->slug) }}"><i class="fas fa-chevron-left"></i><span>{{$item->name}}</span></a>
						<ul class="nested">
							@foreach($item->children as $item)
								<li>
									<a href="{{ route('category', $item->slug) }}">
										<span>{{$item->name}}</span>
									</a>
								</li>
							@endforeach		
						</ul>
					</li>
					@endif
				@endforeach
			</ul>
		</div>
	</div>
</div>
@endif
<div class="cat side-bar box3">
	<div class="title">نمایش محصولات</div>
	<div class="body">
		<check-box></check-box>
	</div>
</div>

<div class="cat side-bar box3">
	<div class="title">قیمت <span>(تومان)</span></div>
	<div class="body">
		<price-range-box></price-range-box>
	</div>
</div>



<div class="cat side-bar box3" style="overflow: hidden;">
	<img src="#" style="
    width: 100%;
    height: 90px;
    border-radius: 10px;
    border: none;
    background: #74d1ed;">
</div>


<div class="cat side-bar box3">
	<div class="title">مشاور تلفنی رایگان</div>
	<div class="body product-box" style="display: block;padding: 0 23px;text-align: center;">
		<img width="100%" src="{{asset('img/page/contact.man.jpg')}}" alt="contact">
		<div class="contact text-l">
			<a href="#">
				<div class="whatsapp text-l">
					<span class="d-flex">@include('icons.whatsApp')</span>
					<span class="text-l">اگر نیاز به راهنمایی دارید با ما در ارتباط باشید</span>
				</div>
			</a>
			<a href="#">
				<div class="telegram text-l">
					<span class="d-flex">@include('icons.telegram')</span>
					<span class="text-l">اگر سوال داربد؟ در تلگرام با ما گفتگو کنید</span>
				</div>
			</a>
		</div>

	</div>
</div>
