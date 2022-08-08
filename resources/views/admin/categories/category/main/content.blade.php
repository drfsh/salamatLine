@if(!$item->children->isEmpty())
	<ul class="accordion" data-accordion data-multi-expand="true" data-allow-all-closed="true">
		@foreach($item->children as $item2)
			@include('admin.categories.category.main.level2.main')
		@endforeach
	</ul>
@else
	<div class="callout primary">
		زیرمجموعه ندارد
	</div>
@endif