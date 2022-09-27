<div class="simple-item @if(!$item->active)out-of-stock @endif" title="{{$item->title}}">
        <div class="cover">
            <img src="{{$item->tiny}}" alt="{{$item->title}}">
            <span class="add-shop-">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path
            d="M7.5 7.67001V6.70001C7.5 4.45001 9.31 2.24001 11.56 2.03001C14.24 1.77001 16.5 3.88001 16.5 6.51001V7.89001"
            stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
            stroke-linejoin="round">

    </path><path
                        d="M8.99999 22H15C19.02 22 19.74 20.39 19.95 18.43L20.7 12.43C20.97 9.99 20.27 8 16 8H7.99999C3.72999 8 3.02999 9.99 3.29999 12.43L4.04999 18.43C4.25999 20.39 4.97999 22 8.99999 22Z"
                        stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                        stroke-linejoin="round" style="
    fill: white;
"></path> <path d="M15.4955 12H15.5045" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" style="
    stroke: #094873;
"></path> <path d="M8.49451 12H8.50349" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" style="
    stroke: #094873;
"></path></svg>
        </span>
            @include('front.product.holder.item.assets.label')
            {{--		@if($item->subtitle)<div class="sub sl">{{$item->subtitle}}</div>@endif--}}
        </div>
    <div class="body">
        <a href="{{ route('product', $item->slug) }}">
            <div class="title sl">{{$item->title}}</div>
            <div class="model sl"><span>مدل : </span> D155r</div>
        </a>
        @include('front.product.holder.item.assets.price')
        @include('front.product.holder.item.assets.button')
    </div>
</div>

