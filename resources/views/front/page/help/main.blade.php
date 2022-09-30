@extends('layouts.front')

@section('content')

    <div class="wrapper" style="background: #fff;">

        <div class="double-gap"></div>
        <div class="double-gap"></div>
        <header class="header">
            <div class="header_flex">
                <div class="header_context_holder">

                    <h1 class="title_main title_header">
                        در کنار خرید شما هستیم
                    </h1>
                    <h2 class="title_main title_header_bg">سخنی با خریداران</h2>
                    <p class="header_text">سلامت لاین با هدف تبدیل شدن به یکی از توزیع‌کنندگان در ایران و منطقه فعالیت
                        می‌نماید. این مجموعه قصد دارد تا به پشتوانه کیفیت و قدمت برندهای موجود در بازار به متمایز نمودن کالا
                        و خدماتش در بازار ایران و منطقه بپردازد.
                    </p>
                </div>
                <div class="header_video_holder">
                    <video class="video" width="650" height="428" controls=""
                           poster="/front/images/credit_guide/video_cover.png">
                        <source src="/front/images/credit_guide/Video-No.1.edit.mp4" type="video/mp4">
                        <!--                    <source src="video.ogg" type="video/ogg">-->
                        مرورگر شما ویدئو با این پسوند را پشتیبانی نمی کند.
                    </video>
                </div>
            </div>
        </header>
        <section class="section">
            <h2 class="title_main">مراحل خرید از فروشگاه سلامت لاین</h2>
            <div class="steps_loan">
                <div class="steps">
                    <div class="steps_context">
                        <h3 class="steps_title">انتخاب محصول مورد نظر</h3>
                        <p class="steps_text">
                            محصول مورد نظر خود را از محصولات سایت انتخاب نمایید
                        </p>
                    </div>
                    <div class="steps_icon">
                        <h2>1</h2>
                    </div>
                    <div class="empty">&nbsp;</div>
                </div>
                <div class="steps">
                    <div class="empty">&nbsp;</div>
                    <div class="steps_icon">
                        <h2>2</h2>
                    </div>
                    <div class="steps_context">
                        <h3 class="steps_title">افزودن به سبد خرید</h3>
                        <p class="steps_text">
                            بعد از انتخاب محصول ان را به سبد خرید اضافه نمایید
                        </p>
                    </div>

                </div>
                <div class="steps">
                    <div class="steps_context">
                        <h3 class="steps_title">ایجاد حساب کاربری</h3>
                        <p class="steps_text">
                            برای ارسال محصول و کالای شما نیاز به هویت شما داریم
                        </p>
                    </div>
                    <div class="steps_icon">
                        <h2>3</h2>
                    </div>
                    <div class="empty">&nbsp;</div>
                </div>
                <div class="steps">
                    <div class="empty">&nbsp;</div>
                    <div class="steps_icon">
                        <h2>4</h2>
                    </div>
                    <div class="steps_context">
                        <h3 class="steps_title">انتقال به درگاه پرداخت انلاین</h3>
                        <p class="steps_text">
                            بعد از انتخاب محصول با توجه به قیمت آن جهت پرداخت به درگاه متصل شوید
                        </p>
                    </div>
                </div>
                <div class="steps">
                    <div class="steps_context" style="min-height: unset;">
                        <h3 class="steps_title"></h3>
                        <p class="steps_text">

                        </p>
                    </div>
                    <div class="steps_icon">
                        <h2><i style="color: #009416;" class="fas fa-check"></i></h2>
                    </div>
                    <div class="empty">&nbsp;</div>
                </div>

            </div>
        </section>
        <section class="section">
            <div class="request_credit_box">
                <h2 class="title_main">اگر سوالی درباره محصولات دارید بپرسید؟ </h2>
                <a href="/landing/credit-request" class="cta_btn">همکالان فروش</a>
            </div>
        </section>
        <section class="section faq_section faq">
            <h2 class="title_main">شاید برات سوال باشه!</h2>
            <ul class="faq_accordion list">
                @foreach($list as $key => $item)
                    <li class="faq_accordion_item item" data-collapse="open">
                        <h6 class="title">
                            {{$key+1}}- {{$item->title}}
                            <div class="icon icon_minus rotateArrow">
                                <i class="fas fa-plus"></i>
                            </div>
                        </h6>
                        <div class="answer">
                            <div class="list_indent">
                                {!! $item->body !!}
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </section>
    </div>
@endsection

