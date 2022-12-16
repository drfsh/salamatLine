<div class="c-100" style="margin-top: 60px;">
    <div class="p-title">
        <h4>تیم فروشگاه سلامت لاین</h4>
    </div>

    <div class="swiper owl-5 flex-column box-info-user">
        <div class="swiper-wrapper">
            @foreach($data['users'] as $v)
                <div class="swiper-slide">
                    <div class="item ">
                        <img src="/img/page/{{$v->img}}">
                        <div class="text">
                            <span class="name">{{$v->name}}</span>
                            <span class="role">{{$v->info}}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
