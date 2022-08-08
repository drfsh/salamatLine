<div class="double-gap"></div>

	<ul class="tabs" data-tabs id="example-tabs">
		<li class="tabs-title @if(!Session::has('reviewsuccess')) is-active @endif"><a href="#panel1" aria-selected="true">توضیحات</a></li>
		<li class="tabs-title"><a data-tabs-target="panel2" href="#panel2">نظرات</a></li>
		<li class="tabs-title @if(Session::has('reviewsuccess')) is-active @endif"><a data-tabs-target="panel3" href="#panel3">ارسال نظر</a></li>
	</ul>
	<div class="tabs-content" data-tabs-content="example-tabs">
		<div class="tabs-panel @if(!Session::has('reviewsuccess')) is-active @endif" id="panel1">
			@include('front.product.main.tabs.content.main')
		</div>
		<div class="tabs-panel" id="panel2">
			@include('front.product.main.tabs.review.main')
		</div>
		<div class="tabs-panel @if(Session::has('reviewsuccess')) is-active @endif" id="panel3">
			@include('front.product.main.tabs.addReview.main')
		</div>
	</div>

<div class="double-gap"></div>

{{-- @include('front.product.main.left.mainBox.main') --}}
