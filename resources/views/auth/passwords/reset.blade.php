@extends('layouts.auth')

@section('content')

    <div class="auth-box"> 
        <div class="title"><h1>{{ __('Reset Password') }}</h1></div>
        <div class="body pa2">
            @include('auth.passwords.reset.form')
        </div>
    </div>

@endsection
