@extends('layouts.auth')

@section('content')
    <div class="auth-box"> 
        <div class="title"><h1>{{ __('Confirm Password') }}</h1></div>
        <div class="body pa2">
                {{ __('Please confirm your password before continuing.') }}
                @include('auth.passwords.confirm.form')
        </div>
    </div>
@endsection
