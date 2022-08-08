@extends('layouts.auth')

@section('content')
    <div class="auth-box"> 
        <div class="body">
            @if (session('resent'))
                {{ __('A fresh verification link has been sent to your email address.') }}
            @endif
            {{ __('Before proceeding, please check your email for a verification link.') }}
            {{ __('If you did not receive the email') }},
                @include('auth.verify.form')
        </div>
    </div>
@endsection