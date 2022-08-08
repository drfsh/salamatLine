<form method="POST" action="{{ route('login') }}">
	@csrf
	<div class="grid-x grid-padding-x">
		<div class="cell">
			<label for="email">{{ __('auth.Email') }}</label>
			<input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
			@error('email')
				<span class="invalid-feedback">{{ $message }}</span>
			@enderror
		</div>

		<div class="cell">
			<label for="password">{{ __('auth.Password') }}</label>
			<input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
			@error('password')
				<span class="invalid-feedback">{{ $message }}</span>
			@enderror		
		</div>
		<div class="cell auto">
			<input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
			<label for="remember">
				{{ __('auth.Remember') }}
			</label>
		</div>
		<div class="cell shrink">
			<a href="{{ route('password.request') }}">
				{{ __('auth.ForgotPassword') }}
			</a>
		</div>
		<div class="cell"><div class="double-gap"></div></div>
		<div class="cell">
			<button type="submit" class="button success expanded">
				{{ __('auth.LoginButton') }}
			</button>		
		</div>
	</div>
</form>