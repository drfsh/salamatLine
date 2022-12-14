
<form method="POST" action="{{ route('password.email') }}" class="f-ho">
    @csrf
    <div class="input-login">
        <div class="hw100">
            <input id="email" placeholder="ایمیل" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        </div>
        <div class="icon">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M17 20.5H7C4 20.5 2 19 2 15.5V8.5C2 5 4 3.5 7 3.5H17C20 3.5 22 5 22 8.5V15.5C22 19 20 20.5 17 20.5Z" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M17 9L13.87 11.5C12.84 12.32 11.15 12.32 10.12 11.5L7 9" stroke="currentColor" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </div>
    </div>
    @error('email')
    <span class="invalid-feedback" style="width: 100%;">
        کاربری با این ایمیل یافت نشد
    </span>
    @enderror
    <div>
        <button type="submit" class="btn-login">
            <span>{{ __('auth.SendResetPassword') }}</span>
        </button>
    </div>
</form>
