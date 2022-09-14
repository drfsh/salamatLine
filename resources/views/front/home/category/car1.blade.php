@if($data['category'])
    <div class="grid-container home-products home-section">

        <div class="titles">
            @foreach($data['category'] as $key => $item)
                @if($key==3) @break @endif

                <span class="item home-title-product-item @if($key==0) active @endif"
                      data-id="product-{{$item->id}}" data-c="pp1">{{$item->name}}</span>
            @endforeach
        </div>

        @foreach($data['category'] as $key => $item)
            @if($key==3) @break @endif
            <div style="@if($key!=0) display:none @endif" class="cell home-product-item pp1" id="product-{{$item->id}}">
                <div class="owl-box">
                    <div class="swiper owl-5" dir="rtl">
                        <div class="swiper-wrapper">
                            @foreach($item->product as $item)
                                <div class="swiper-slide"><div class="cell">@include('front.product.holder.item.main')</div></div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

