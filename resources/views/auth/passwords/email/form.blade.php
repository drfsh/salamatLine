<form method="POST" action="{{ route('password.email') }}">
	@csrf
	<label for="email">{{ __('auth.Email') }}</label>
		<input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
		@error('email')
			<span class="invalid-feedback">{{ $message }}</span>
		@enderror
		<div class="gap"></div>
	<div>
		<button type="submit" class="button success expanded">
			{{ __('auth.SendResetPassword') }}
		</button>
	</div>
</form>