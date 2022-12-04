<div class="bg-banner @if($data['page']['banners'][0]->style->container)grid-container @endif"
     style="background: {{$data['page']['banners'][0]->style->mainBackground}}">
    <div class="grid-x grid-padding-x ">

        @foreach($data['page']['banners'][0]->items as $item)
            @if($item->type=='banner')
                <div class="cell small-12 medium-{{$item->size}}">
                    <div class="landing-banner">
                        <a href="{{$item->link}}">
                            <img class="lozad banner"
                                 data-src="{{$item->imgPath}}"
                                 alt="{{$item->name}}">
                        </a>
                    </div>
                </div>
            @elseif($item->type=='text')
                <div class="cell small-12 medium-{{$item->size}}">
                    <div class="landing-banner">
                        @if(isset($item->file))
                            <img class="lozad text" data-src="{{$item->imgPath}}">
                        @endif
                        <div>
                            <div style="color: {{$item->titleColor}};font-size: {{$item->titleSize}}px">{{$item->title}}</div>
                            <div style="color: {{$item->valueColor}};font-size: {{$item->valueSize}}px">{{$item->value}}</div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
