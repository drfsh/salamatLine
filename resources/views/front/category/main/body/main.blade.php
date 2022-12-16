<div class="double-gap"></div>

<div class="grid-x">
	@forelse($data['products'] as $item)
		<div class="cell small-6 medium-4 large-4">@include('front.product.holder.item.main')</div>
		@empty
		<div class="cell">
			<div class="callout warning">هیچ محصولی در این دسته‌بندی تعریف نشده است.</div>
		</div>
	@endforelse
</div>
<div class="double-gap"></div>
{{ $data['products']->links() }}
<div class="double-gap"></div>


@include('front.category.main.body.content')

@if(!$data['sub_cats']->isEmpty() && $agent->isMobile())
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-11">
			<div class="button expanded hollow show-subcat">زیر مجموعه‌های {{$data['category']->name}}</div>
			<div class="double-gap"></div>
		</div>
	</div>
@endif
