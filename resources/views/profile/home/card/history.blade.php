<div class="mt-3" style="padding: 11px;">
    <div class="title" style="margin: 20px 0px 10px;">کالاهایی که امروز دیده اید</div>

    @if(sizeof($data['most_view'])>0)
    <div class="owl-box">
        <div class="swiper owl-3" dir="rtl">
            <div class="swiper-wrapper">
                @foreach($data['most_view'] as $item)
                    <div class="swiper-slide"><div class="cell">@include('front.product.holder.item.main')</div></div>
                @endforeach
            </div>
        </div>
    </div>
    @else
        <div class="cell">
            <div class="callout warning">هیچ محصولی در این دسته‌بندی تعریف نشده است.</div>
        </div>
    @endif

</div>
