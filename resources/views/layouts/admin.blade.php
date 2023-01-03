<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
<head>
    @include('admin.global.head.main')
    @yield('headScript')

</head>
<body>
	<div class="off-canvas-wrapper">
		<div class="off-canvas position-right" id="AddItem" data-off-canvas>
			@include('admin.global.sidebar.AddItem')
		</div>
		@if($agent->isMobile())
			@include('admin.global.mobile.topbar')
		@endif
		<div class="off-canvas-content" data-off-canvas-content>
			<div class="grid-x">
					@if($agent->isMobile())
						<div class="cell">
							<div class="padding">
								@yield('NavItems')
								<div id="app">@yield('content')</div>
							</div>
						</div>
					@else
						<div class="cell navbar" data-sticky-container>
							<div class="sticky" data-sticky data-margin-top="0">
								@include('admin.global.sidebar.main')
							</div>
						</div>
						<div class="cell body">
							<div class="padding">
								@yield('NavItems')
								<div id="app">@yield('content')</div>
							</div>
						</div>
					@endif
			</div>
		</div>
	</div>
    <script src="{{ mix('js/admin/app.js') }}"></script>
    <script src="{{ mix('js/admin/admin2.js') }}"></script>
    @yield('js')
</body>
</html>
