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
