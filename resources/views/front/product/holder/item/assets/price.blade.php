<div class="price-box">
    @if($item->active)
        @if(!$item->discount_price)
            <div class="price ho c">
                <div class="">{!! $item->showing_price !!}</div>
            </div>
        @else
            <div class="grid-x align-middle price">
                <div class="cell shrink">
                    <div class="old">{!! $item->showing_price !!}</div>
                </div>
                <div class="">
                    {!! $item->discount_price !!}
                </div>
            </div>
        @endif
    @else
        <div class="price text-center">موجود نیست</div>
    @endif
    <basket-product
            id="{{$item->id}}"
            name="{{$item->title}}"
            model="{{$item->subtitle}}"
            img="{{$item->tiny}}"
    >
    </basket-product>
</div>