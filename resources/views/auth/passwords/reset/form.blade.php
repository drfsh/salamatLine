<form method="POST" action="{{ route('password.update') }}">
	@csrf
	<input type="hidden" name="token" value="{{ $token }}">
		<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
		<input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

		@error('email')
			<span class="invalid-feedback">{{ $message }}</span>
		@enderror
		<label for="password">{{ __('Password') }}</label>
			<input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
			@error('password')
				<span class="invalid-feedback">{{ $message }}</span>
			@enderror

		<label for="password-confirm">{{ __('Confirm Password') }}</label>
		<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

		<div>
			<button type="submit" class="button">
				{{ __('Reset Password') }}
			</button>
		</div>
</form>