@if(!$item->discount->isEmpty() || $item->featured || true)
    <ul class="badge">
        @if(!$item->discount->isEmpty())
            <li class="r">{{$item->discount[0]->percent}} تخفیف</li>@endif
        @if($item->featured)
            <li class="s">
                <div class="star">
                    <span class="icon">
                        @include('icons.star_speed')
                    </span>
                    <span class="text">
                        برگزیده
                    </span>
                </div>
            </li>
        @endif
    </ul>
@endif
<ul class="meta">
    @if($item->feature->company_id)
        <li>{{$item->feature->company->title}}</li>@endif
    @if($item->brand_id)
        <li><span>برند:</span>{{$item->brand->title}}</li>@endif
    @if($item->country_id)
        <li><span>ساخت:</span>{{$item->country->title}}</li>@endif

</ul>