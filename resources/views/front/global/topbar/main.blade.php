@if ($agent->isMobile())
	@include('front.global.topbar.mobile.main')
@else
	@include('front.global.topbar.desktop.main')
@endif

