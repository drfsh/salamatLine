<div class="g">
    <div class="name">
        <h1>{{$data['product']->title}}@if($data['product']->subtitle) ({{$data['product']->subtitle}})@endif</h1>
    </div>
    <div class="name-en">
		<span role="button" class="zm">
			@include('icons.shield')
			تضمین اصالت کالا
		</span>
        <span class="nm">
			product english name model D1
		</span>
    </div>
    <div class="last-update text-l">
        @include('icons.calendar')
        <span> آخرین بروزرسانی : </span>
        <span> {{$data['product']->updated_at}} </span>
    </div>
    <range-star value="{{($data['product']->feature->teamstar*10)}}"></range-star>

    <div class="mt50 @if(!$data['product']->active)out-of-stock @endif">
        @include('front.product.main.card.main.center.cart')
    </div>

    <div class="meta-box">
        <ul>
            <li>
                <span>
                    @include('icons.list1')
                </span>
                <span>دسته‌ : </span>
                @foreach($data['product']->categories as $item)
                    <a href="{{ route('category', $item->slug) }}">{{$item->name}}</a>@if(!$loop->last)، @endif
                @endforeach
            </li>
            @if($data['product']->brand_id)
                <li>
                    <span>
                        @include('icons.copyright')
                    </span>
                    <span>برند :</span>
                    <a href="{{ route('brand', $data['product']->brand->slug) }}">{{$data['product']->brand->title}}</a>
                </li>
            @endif
            @if($data['product']->country_id)
                <li>
                    <span>
                        @include('icons.award')
                    </span>
                    <span>کشور سازنده : </span>
                    <a href="{{ route('country', $data['product']->country->slug) }}">{{$data['product']->country->title}}</a>
                </li>
            @endif
        </ul>
    </div>


</div>

{{--@include('front.product.main.card.main.center.badge')--}}