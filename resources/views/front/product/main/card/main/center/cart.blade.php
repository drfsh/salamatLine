@if($data['product']->active && $data['product']->price_hide==false)
    <div id="product-add-cart">

        <product-add-cart
                id="{{$data['product']->id}}"
                singleprice="{{$data['product']->price}}"
                multiprice="{{$data['product']['multiprice']}}"
                multifeature="{{$data['product']['multifeature']}}"
                discount="{{$data['product']['discount']}}">
        </product-add-cart>
    </div>

{{--    <add-cart v-show="true"--}}
{{--              :pid="{{$data['product']->id}}"--}}
{{--              :multiprice="{{$data['product']['multiprice']}}"--}}
{{--              :multifeature="{{$data['product']['multifeature']}}"--}}
{{--              :singleprice="'{{$data['product']->price}}'"--}}
{{--              :discount="{{$data['product']['discount']}}"--}}
{{--              redirect="{{ url()->current() }}"--}}
{{--              :auth="{{ !empty(Auth::user()->id) ? Auth::user()->id : '0' }}"--}}
{{--    />--}}
@elseif($data['product']->price_hide==false)
    <div class="mw-300 diactive">
        <product-diactive
            @if(Auth::check()) number="{{Auth()->user()->mobile}}" @endif
            :id="{{$data['product']->id}}"></product-diactive>
    </div>
@else
    <div class="contact">
        <div style="font-size: 14px;margin-bottom: 14px;">برای اطلاع از قیمت تماس بگیرید</div>
        <a class="d-inline-block w100px" href="#">
            <div class="whatsapp text-l">
                <span class="d-flex">@include('icons.whatsApp')</span>
                <span class="text-l">واتساپ</span>
            </div>
        </a>
        <a class="d-inline-block w100px" href="#">
            <div class="telegram text-l">
                <span class="d-flex">@include('icons.telegram')</span>
                <span class="text-l">تلگرام</span>
            </div>
        </a>
        <a class="d-inline-block w100px" href="tel:02166462985">
            <div class="call text-l">
                <span class="d-flex">@include('icons.phone')</span>
                <span class="text-l">تماس</span>
            </div>
        </a>
    </div>
@endif
