<div class="double-gap"></div>
@foreach($data['banner'] as $item)
    @if($item->pos==5)
        <div class="cell medium-6">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
    @if($item->pos==6)
        <div class="cell medium-6">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
@endforeach
<div class="double-gap"></div>
