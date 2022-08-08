<form method="POST" action="{{ route('verification.resend') }}">
    @csrf
    <button type="submit" class="button">{{ __('click here to request another') }}</button>.
</form>