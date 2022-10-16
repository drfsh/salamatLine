@extends('layouts.auth')

@section('content')
    <div class="auth-box">
        <h4>{{ __('auth.resetPassword') }}</h4>
        <div class="body-login text-center">
            <div class=" info">ایمیل خود را وارد کنید</div>

            @if (session('status'))
                <div>
                    لینک بازیابی پسورد به ایمیل شما ارسال شد!
                </div>
            @endif
            @include('auth.passwords.email.form')

        </div>
    </div>
@endsection



