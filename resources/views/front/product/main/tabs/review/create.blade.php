@if (Session::has('reviewsuccess'))
    <div class="grid-x">
        <div class="cell">
            <div class="callout success">
                {{ Session::get('reviewsuccess') }}
            </div>
            <div class="gap"></div>
        </div>
    </div>
@endif
<div class="comment-info">
    <div class="product-info gold more-features">
        <div class=title>قوانین دیدگاه</div>

        <ul>
            <li>از ارسال دیدگاه های توهین آمیز پرهیز کنید</li>
            <li>لطفا نطر واقعی خود را بنویسید</li>
            <li>دیدگاه شما میتواند به خرید دیگران کمک کند</li>
        </ul>
    </div>
</div>

@if (Auth::check())
<div class="comment-new">
    <div class="title">
        @include('icons.comment')
        دیدگاه خود را بنویسید
    </div>
    <div class="subtitle">نشانی ایمیل شما منتشر نخواهد شد.بخش های مورد نیاز علامت گذاری شده اند*</div>
    <div class="body">
        {!! Form::open(['url' => route('review', $data['product']->slug), 'method' => 'POST']) !!}

        <div class="star">
            <span>امتیاز شما</span>
            <input-star name="rating"></input-star>
        </div>
        @if ($errors->has('rating'))
            <span class="label warning">
                <strong>{{ $errors->first('rating') }}</strong>
            </span>
        @endif
        <div class="star">
            <span>آیا محصول را به دیگران پیشنهاد میکنید؟</span>
            <div class="">
                <input style="width: 10px;" class="m0" id="recommend_yes" type="radio" name="recommend" value="Yes">
                <label for="recommend_yes">بله</label>

                <input style="width: 10px;" class="m0" id="recommend_no" type="radio" name="recommend" value="No">
                <label for="recommend_no">خیر</label>
            </div>
        </div>
        @if ($errors->has('recommend'))
            <span class="label warning">
                <strong>{{ $errors->first('recommend') }}</strong>
            </span>
        @endif
        <div class="input-g mt30">
            <span>دیدگاه شما *</span>
            <textarea style="margin: 0;height: 100px;min-width: 100%;" name="body"></textarea>
        </div>
        @if ($errors->has('body'))
            <span class="label warning">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
{{--        <div class="grid-x grid-padding-">--}}
{{--            <div class="cell medium-12 large-6">--}}
{{--                <div class="input-g">--}}
{{--                    <span>نام *</span>--}}
{{--                    {{ Form::text('name') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="cell medium-12 large-6">--}}
{{--                <div class="input-g">--}}
{{--                    <span>ایمیل *</span>--}}
{{--                    {{ Form::text('email') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <label>--}}
{{--            <input type="checkbox" name="remind">--}}
{{--            ذخیره نام، ایمیل و وبسایت من در مرورگر برای زمانی که دوباره دیدگاه مینویسم.--}}
{{--        </label>--}}
        <div class="double-gap"></div>

        {{ Form::submit('ارسال', array('class' => 'button success')) }}

        {!! Form::close() !!}
    </div>
</div>
@else
    <div class="callout warning">جهت ارسال نظرات خود در مورد این محصول <a href="{{ route('login')}}">وارد</a> شوید.
    </div>
@endif
