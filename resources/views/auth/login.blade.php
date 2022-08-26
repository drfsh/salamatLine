@extends('layouts.auth')

@section('content')
    @error('password')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
    @error('email')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror

    <auth-login></auth-login>
@endsection
