<form method="POST" action="{{ route('password.confirm') }}">
    @csrf
    <label for="password">{{ __('Password') }}</label>
        <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

        @error('password')
            <span class="invalid-feedback">{{ $message }}</span>
        @enderror


        <button type="submit" class="button">
            {{ __('Confirm Password') }}
        </button>

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                {{ __('Forgot Your Password?') }}
            </a>
        @endif
</form>