@extends('layouts.auth')

@section('content')
    @error('name')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
    @error('email')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
    @error('password')
    <span class="invalid-feedback">{{ $message }}</span>
    @enderror
    <auth-register></auth-register>
@endsection

