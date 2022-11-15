<div class="double-gap"></div>
@foreach($data['banner'] as $item)
    @if($item->pos==7)
        <div class="cell medium-12">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
@endforeach
<div class="double-gap"></div>