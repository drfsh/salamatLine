@if ($agent->isMobile())
    <section class="grid-container swiper owl-6  home-category-top home-section" style="margin-top: 45px;">

        <div class="swiper-wrapper">
            @foreach ($data['banner'] as $item)

                @if($item->pos==10 || $item->pos==11 || $item->pos==12 || $item->pos==13 || $item->pos==14 )

                    <div class="item swiper-slide">
                        <a href="{{$item->link}}">
                            <div class="box">
                                <img src="{{$item->large}}">
                                <span>{{$item->title}}</span>
                            </div>
                        </a>
                    </div>

                @endif
            @endforeach
        </div>
    </section>
@else
<section class="grid-container home-icons home-category-top home-section" style="margin-top: 45px;">

    @foreach ($data['banner'] as $item)

        @if($item->pos==10 || $item->pos==11 || $item->pos==12 || $item->pos==13 || $item->pos==14 )

            <div class="item">
                <a href="{{$item->link}}">
                    <div class="box">
                        <img src="{{$item->large}}">
                        <span>{{$item->title}}</span>
                    </div>
                </a>
            </div>

        @endif
    @endforeach
</section>
@endif