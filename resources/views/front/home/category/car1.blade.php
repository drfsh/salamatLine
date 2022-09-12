@if($data['category'])
    <div class="grid-container home-products home-section">

        <div class="titles">
            @foreach($data['category'] as $key => $item)
                <span class="item home-title-product-item @if($key==0) active @endif"
                      data-id="product-{{$item->id}}">{{$item->name}}</span>
                @if($key==2) @break @endif
            @endforeach
        </div>

        @foreach($data['category'] as $key => $item)
            <div style="@if($key!=0) display:none @endif" class="cell home-product-item" id="product-{{$item->id}}">
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
h