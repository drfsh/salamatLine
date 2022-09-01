<div>
    <div class="more-features">
        <ul>
            <li class="title">برخی از ویژگی ها</li>
            <li>سیستم یهینه</li>
            <li>مکس قوی</li>
            <li>ظاهر زیبا</li>
            <li>وزن سبک</li>
        </ul>
    </div>

    <div class="contact">
        <a href="#">
            <div class="whatsapp text-l">
                <span class="d-flex">@include('icons.whatsApp')</span>
                <span class="text-l">اگر نیاز به راهنمایی دارید با ما در ارتباط باشید</span>
            </div>
        </a>
        <a href="#">
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
            ارسال تا 6 روزکاری
        </span>
        </div>
    @else
        <product-timer time="{{$data['product']->discount[0]->end_date}}"></product-timer>
    @endif
</div>