@extends('layouts.profile')

@section('content')
    <div class="grid-x grid-padding-x ">

        <div class="cell">
            <div class="box2" style="padding-bottom: 2px">
                <div class="title">از این فرم جهت پیگیری سفارش استفاده کنید</div>
                <div class="bbox" style="padding: 18px;margin: 14px">
                    {{ Form::model( array('route' => array('OrdersCheck'), 'method' => 'Post')) }}
                    <div class="grid-x grid-padding-x">

                        <div class="cell medium-12">
                            {{ Form::label('code', 'شناسه سفارش') }}
                            {{ Form::text('code', null,['placeholder'=>'شناسه سفارش']) }}
                            @if ($errors->has('code'))
                                <span class="invalid-feedback">{{ $errors->first('code') }}</span>
                            @endif
                        </div>
                        <div class="cell medium-12">
                            {{ Form::label('number', 'شماره موبایل') }}
                            {{ Form::text('number', auth()->user()->mobile,['placeholder'=>'شماره موبایلی که هنگام خرید وارد کرده اید']) }}

                            @if ($errors->has('number'))
                                <span class="invalid-feedback">{{ $errors->first('number') }}</span>
                            @endif
                        </div>
                        <div class="cell">
                            {{ Form::submit('پیگیری سفارش', array('class' => 'button add-shop m-0')) }}
                        </div>
                    </div>
                    {{Form::close()}}

                    <div class="bbox mt-17">
                        <div class="title2">وضعیت سفارش</div>
                        <div class="flex-row menu-bl-p">
                            <div class="flex-center w-100 p-status">
                                <div class="ml-2">
                                    <img src="{{asset('img/profile/status-delivered.svg')}}">
                                </div>
                                <div>
                                    <div>درصف بررسی</div>
                                </div>
                            </div>
                            <div class="flex-center w-100 p-status" >
                                <div class="ml-2">
                                    <img src="{{asset('img/profile/status-processing.svg')}}">
                                </div>
                                <div>
                                    <div>تایید سفارش</div>
                                </div>
                            </div>
                            <div class="flex-center w-100 p-status">
                                <div class="ml-2">
                                    <img src="{{asset('img/profile/status-returned.svg')}}">
                                </div>
                                <div>
                                    <div>سفارش تکمیل شده</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        {{--		<div class="cell">--}}
        {{--			@if($errors->any())--}}
        {{--				<div class="cell">--}}
        {{--					<div class="callout success">--}}
        {{--						{{$errors->first()}}--}}
        {{--					</div>--}}
        {{--				</div>--}}
        {{--			@endif--}}
        {{--		</div>--}}

        {{--		@forelse($data['invoice'] as $item)--}}
        {{--			<div class="cell">--}}
        {{--				@include('profile.orders.item.main')--}}
        {{--			</div>--}}
        {{--		@empty--}}
        {{--			<div class="cell">--}}
        {{--				<div class="callout">هیچ سفارش فعالی وجود ندارد.</div>--}}
        {{--			</div>--}}
        {{--		@endforelse--}}
    </div>
@endsection
