@foreach($data['banner'] as $item)
    @if($item->pos==1)
        <div class="cell medium-8">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
    @if($item->pos==2)
        <div class="cell medium-4">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
    @if($item->pos==3)
        <div class="double-gap"></div>
        <div class="cell medium-6">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
    @if($item->pos==4)
        <div class="cell medium-6">
            <div class="landing-banner">
                <a href="{{$item->link}}">
                    <img class="lozad" data-src="{{$item->large}}" alt="{{$item->title}}">
                </a>
            </div>
        </div>
    @endif
@endforeach