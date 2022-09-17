<section class="grid-container home-icons home-category-top home-section" style="margin-top: 45px;">
    @foreach($data['category'] as $key => $item)
        @if($key==5) @break @endif
            <div class="item">
                <a href="{{route('category',$item->slug)}}">
                    <div class="box">
                        <img src="{{asset('img/page/سلامت لاین.webp')}}">
                        <span>{{$item->name}}</span>
                    </div>
                </a>
            </div>

    @endforeach
</section>
