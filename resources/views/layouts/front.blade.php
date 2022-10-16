<?php
$categories = App\Models\Category::defaultOrder()->toTree()->get();
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
	<head>
		@include('front.global.head.main')
	</head>
	<body>

		<div class="off-canvas-wrapper" id="app">
			<div class="content">

				@include('front.global.topbar.main')

				<div class="off-canvas-content">
					@yield('content')
				</div>

			</div>
		</div>

        <div id="alerts-cart"></div>

		@include('front.global.footer.main')
		@include('front.global.js')
	</body>
</html>
