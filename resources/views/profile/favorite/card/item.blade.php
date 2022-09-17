<div class="bbox mt-3">
    <div class="product-item-h">
        <div class="infos">
            <remove-favorites
            id="{{$item->id}}">
            </remove-favorites>
            <a href="{{ route('product', $item->slug) }}" title="{{$item->title}}">
                <img src="{{$item->tiny}}" alt="{{$item->title}}">
            </a>
            <a href="{{ route('product', $item->slug) }}" title="{{$item->title}}">
            <div class="texts">
                    <span>{{$item->title}}</span>
                    <span>{!! $item->showing_price !!}</span>
                </div>
            </a>
        </div>
        <div role="button" class="">
            <add-basket-f
                id="{{$item->id}}"
                name="{{$item->title}}"
                model="{{$item->subtitle}}"
                img="{{$item->tiny}}">
            </add-basket-f>
        </div>
    </div>
</div>
