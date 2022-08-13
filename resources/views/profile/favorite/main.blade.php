@extends('layouts.profile')

@section('content')


    <div class=" box2">
        <div class="title">لیست آخرین علاقه مندی ها</div>


        <div style="padding: 0 22px 22px;">
            @if(!$products->isEmpty())
                <div class="">
                    @foreach($products as $item)
                            @include('profile.favorite.card.item')
                    @endforeach
                </div>
            @else
                <div class="grid-x grid-padding-x">
                    <div class="cell medium-6 medium-offset-3">
                        <div class="gbox g">
                            <div class="body">
                                <p>در این قسمت می‌توانید لیستی از محصولات مورد علاقه‌ی خود را داشته باشید.<br>
                                    پس از ورود به صفحه‌ی داخلیِ هر محصول بر روی افزودن به علاقه‌مندی‌ها کلیک نمایید.</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>




@endsection
