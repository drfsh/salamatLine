@if($data['category'])
    <div class="grid-container home-products home-section">
        <?php $c=0; ?>
        <div class="titles">
            @foreach($data['category'] as $key => $item)
                <?php $c++; ?>

                @if($key<=2) @continue @endif
                <span class="item home-title-product-item @if($key==3) active @endif"
                      data-id="product-{{$item->id}}" data-c="pp2">{{$item->name}}</span>


            @endforeach
        </div>
        <?php $c=0; ?>

        @foreach($data['category'] as $key => $item)
            <?php $c++; ?>

            @if($c<=3) @continue @endif

            <div style="@if($c>4) display:none @endif" class="cell home-product-item pp2" id="product-{{$item->id}}">
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
