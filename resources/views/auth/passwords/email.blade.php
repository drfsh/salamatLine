@extends('layouts.auth')

@section('content')
    <div class="auth-box">
        <div class="title-p">
            <div class="current-page">{{ __('auth.resetPassword') }}</div>
            <a href="/login" class="next-page">
                ورود
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <g id="vuesax_linear_arrow-left" data-name="vuesax/linear/arrow-left" transform="translate(-364 -252)">
                        <g id="arrow-left">
                            <path id="Vector" d="M7.1,15.84.577,9.32a1.986,1.986,0,0,1,0-2.8L7.1,0" transform="translate(371.902 256.08)" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                            <path id="Vector-2" data-name="Vector" d="M0,0H24V24H0Z" transform="translate(388 276) rotate(180)" fill="none" opacity="0"/>
                        </g>
                    </g>
                </svg>
            </a>
        </div>

        <div class="body-login text-center">
            <div class=" info">ایمیل خود را وارد کنید</div>

            @if (session('status'))
                <div class="recovery-email-send">
                    لینک بازیابی پسورد به ایمیل شما ارسال شد!
                </div>
            @endif
            @include('auth.passwords.email.form')

        </div>
    </div>
@endsection



