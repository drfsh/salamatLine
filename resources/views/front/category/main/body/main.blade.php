

<div class="box2 box3">
	<div class="title" style="font-size: 16px">{{$data['category']->name}}</div>
	<div class="products-items">
		<div style="font-size: 13px;">
			<span>نمایش</span>
			{{$data['show']['in']}}
			<span>-</span>
			{{$data['show']['to']}}
			از
			{{$data['products']->total()}}
			نتیجه
		</div>
		<div class="feacher">
			<span>مرتب سازی بر اساس : </span>
			<span class="item">محبوبیت</span>
			<span class="item">امتیاز</span>
			<span class="item">جدیدترین</span>
			<span class="item">ارزان ترین</span>
			<span class="item">گران ترین</span>
		</div>
	</div>
</div>
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
@if(!$data['sub_cats']->isEmpty() && $agent->isMobile())
	<div class="grid-x grid-padding-x align-center">
		<div class="cell small-11">
			<div class="button expanded hollow show-subcat">زیر مجموعه‌های {{$data['category']->name}}</div>
			<div class="double-gap"></div>
		</div>
	</div>
@endif