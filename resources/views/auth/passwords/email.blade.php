@extends('layouts.auth')

@section('content')
    <div class="auth-box"> 
        <div class="title"><h1>{{ __('auth.resetPassword') }}</h1></div>
        <div class="body pa2">
            @if (session('status'))
                <div>
                    {{ session('status') }}
                </div>
            @endif
            @include('auth.passwords.email.form')
        </div>
    </div>
@endsection



