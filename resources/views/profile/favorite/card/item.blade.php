<a href="{{ route('product', $item->slug) }}" title="{{$item->title}}">
    <div class="bbox mt-3">
        <div class="product-item-h">
            <div class="infos">
                <i class="fas fa-trash"></i>
                <img src="{{$item->tiny}}" alt="{{$item->title}}">
                <div class="texts">
                    <span>{{$item->title}}</span>
                    <span>{!! $item->showing_price !!}</span>
                </div>
            </div>
            <div class="">
                <span class="add-shop">اضافه شدن به سبد خرید</span>
            </div>
        </div>
    </div>
</a>
