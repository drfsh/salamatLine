<form method="POST" action="{{ route('register') }}">
    @csrf
        <label for="name">{{ __('auth.Name') }}</label>


            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror




        <label for="email">{{ __('auth.Email') }}</label>


            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror



        <label for="password">{{ __('auth.Password') }}</label>


            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror



            <label for="password-confirm">{{ __('auth.ConfirmPassword') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">

            <div class="gap"></div>


        <div>
            <button type="submit" class="button success expanded">
                {{ __('auth.RegisterButton') }}
            </button>
        </div>

</form>