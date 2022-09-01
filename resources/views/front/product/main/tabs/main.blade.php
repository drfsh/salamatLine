<div class="double-gap"></div>

<div class="box3 product-tabs" style="padding: 10px;">
	<ul class="title-tabs" data-tabs id="example-tabs">
		<li class="tabs-title @if(!Session::has('reviewsuccess')) is-active @endif">
			<a data-tabs-target="panel1" href="#panel1">
				<div>
				<span class="icon">
					@include('icons.document_text')
				</span>
					<span class="text">توضیحات</span>
				</div>
			</a>
		</li>
		<li class="tabs-title">
			<a data-tabs-target="panel2" href="#panel2">
			<div>
				<span class="icon">
					@include('icons.task')
				</span>
				<span class="text">توضیحات تکمیلی</span>
			</div>
			</a>
		</li>
		<li class="tabs-title @if(Session::has('reviewsuccess')) is-active @endif">
			<a data-tabs-target="panel3" href="#panel3">
			<div>
				<span class="icon">
					@include('icons.comment')
				</span>
				<span class="text">نظرات ({{$data['product']->getApprovedRatings($data['product']->id, 'desc')->count()}})</span>
			</div>
			</a>
		</li>
	</ul>
	<div class="body">
		<div class="tabs-content" data-tabs-content="example-tabs">
			<div class="tabs-panel @if(!Session::has('reviewsuccess')) is-active @endif" id="panel1">
				@include('front.product.main.tabs.content.main')
			</div>
			<div class="tabs-panel" id="panel2">
				@include('front.product.main.tabs.feature.feature')
			</div>
			<div class="tabs-panel p0 @if(Session::has('reviewsuccess')) is-active @endif" id="panel3">
				@include('front.product.main.tabs.review.main')
			</div>
		</div>
	</div>
</div>

<div class="double-gap"></div>


{{-- @include('front.product.main.left.mainBox.main') --}}
