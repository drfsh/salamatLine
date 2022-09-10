<?php
$categories = App\Models\Category::defaultOrder()->toTree()->get();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
	<head>
		@include('front.global.head.main')
	</head>
	<body>
		<!-- Google Tag Manager (noscript) -->
		<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJJLRZT"
		height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
		<!-- End Google Tag Manager (noscript) -->
		<div class="off-canvas-wrapper" id="app">
			<div class="content">

				@include('front.global.topbar.main')

				<div class="off-canvas-content" data-off-canvas-content>
					@yield('content')
				</div>
				
			</div>
		</div>
		@include('front.global.footer.main')
		@include('front.global.js')
	</body>
</html>