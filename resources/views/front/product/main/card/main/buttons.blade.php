<div class="buttons">
    <ul class="badge">
        @if(!$data['product']->discount->isEmpty())
            <li class="r">{{$data['product']->discount[0]->percent}} تخفیف</li>@endif
        @if($data['product']->featured || true)
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

        <li>
            <div class="bs">
                <div>
                    <span class="circle-hover">
                        @include('icons.heart')
                    </span>
                </div>
                <div>
                    <span class="circle-hover">
                        @include('icons.shuffle')
                    </span>
                </div>
                <div>
                    <span class="circle-hover">
                        <i class="fas fa-share-alt"></i>
                    </span>
                </div>
            </div>
        </li>
        <li>
            <div class="bs" style="padding:11px 9px;margin: 0;">
                <div>
                    <span class="circle-hover">
                        @include('icons.play')
                    </span>
                </div>
            </div>
        </li>
    </ul>
</div>
