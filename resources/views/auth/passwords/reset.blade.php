@extends('layouts.auth')

@section('content')
    <div class="auth-box">
        <h4>{{ __('تغییر پسورد') }}</h4>
        <div class="body-login text-center">
            @include('auth.passwords.reset.form')
        </div>
    </div>
@endsection
