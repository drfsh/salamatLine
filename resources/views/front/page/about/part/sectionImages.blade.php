<div class="c-100" style="margin-top: 60px;">
    <div class="p-title">
        <h4>فروشگاه سلامت لاین</h4>
    </div>

    <div class="swiper main-slider" style="margin: 26px;" dir="rtl">
        <div class="swiper-wrapper">
            @foreach ($data['images'] as $item)
                <div class="swiper-slide">
                    <div class="item" style="border-radius: 10px;overflow: hidden">
                        <img class="lozad" data-src="{{ $item->path }}">
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
    </div>
</div>
