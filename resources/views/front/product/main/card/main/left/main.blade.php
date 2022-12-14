<div>
    <div class="more-features">
        <ul>
            <li class="title">برخی از ویژگی ها</li>
            @foreach(explode('#',$data['product']->feature->more) as $v)
                @if(trim($v)!=='')
                    <li>{{$v}}</li>
                @endif
            @endforeach
        </ul>
    </div>

    <div class="contact">
        <a href="whatsapp://send?phone=+98{{$globalcontact[0]->whatsapp}}">
            <div class="whatsapp text-l">
                <span class="d-flex">@include('icons.whatsApp')</span>
                <span class="text-l">اگر نیاز به راهنمایی دارید با ما در ارتباط باشید</span>
            </div>
        </a>
        <a href="https://t.me/{{$globalcontact[0]->telegram}}">
            <div class="telegram text-l">
                <span class="d-flex">@include('icons.telegram')</span>
                <span class="text-l">اگر سوال داربد؟ در تلگرام با ما گفتگو کنید</span>
            </div>
        </a>
    </div>
    @if($data['product']->discount->isEmpty())

        <div class="send-day">
        <span class="icon">
            @include('icons.car')
        </span>
            <span class="text">
                @if($data['product']->feature->day!=null)
            ارسال تا {{$data['product']->feature->day}} روزکاری
                @else
                    ارسال تا 2 روزکاری
                @endif
        </span>
        </div>
    @else
        <product-timer time="{{$data['product']->discount[0]->end_date}}"></product-timer>
    @endif
</div>
