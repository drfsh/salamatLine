<div class="buttons">
    <ul class="badge">
        @if($data['product']->featured)
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
        @elseif($data['product']->active && $data['product']->discount->isEmpty())
            <li class="s">
                <div class="star">
                    <span class="icon">
                        @include('icons.tick-square')
                    </span>
                    <span class="text">
                        موجود
                    </span>
                </div>
            </li>
        @elseif($data['product']->discount->isEmpty())
            <li class="s">
                <div class="star diactive">
                    <span class="icon">
                        @include('icons.close-square')
                    </span>
                    <span class="text">
                        موجود
                        نیست
                    </span>
                </div>
            </li>
        @endif
        @if(!$data['product']->discount->isEmpty())
            <li class="s">
                <div class="star percent">
                    <span class="icon">
                        @include('icons.ticket')
                    </span>
                    <span class="text">
                        {{$data['product']->discount[0]->percent}}
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
                        @include('icons.network')
                    </span>
                </div>
            </div>
        </li>
        @if(Auth::check() && Auth::user()->hasRole('Admin'))
            <li>
                <a href="{{ route('product.edit', $data['product']->id) }}" target="_blank">
                    <div class="bs" style="padding:11px 9px;margin: 0;">
                        <div>
                    <span class="circle-hover">
                        @include('icons.edit2')
                    </span>
                        </div>
                    </div>
                </a>
            </li>
        @endif
    </ul>
</div>
