<div class="box radius mb2 shadow px1">
	<div class="gap"></div>
	<div class="grid-x grid-padding-x">
		@if($data['product']->feature->material_id)
			<x-product.feature icon="far fa-clone" title="جنس" :text="$data['product']->feature->material->title" />
		@endif

		@if($data['product']->feature->weight)
			<x-product.feature icon="fas fa-weight" title="وزن" :text="$data['product']->feature->weight" />
		@endif

		@if($data['product']->feature->numberin)
			<x-product.feature icon="fas fa-box" title="تعداد در بسته" :text="$data['product']->feature->numberin" />
		@endif

		@if($data['product']->feature->expire_at)
			<x-product.feature icon="fas fa-calendar-day" title="تاریخ انقضا" :text="Verta($data['product']->feature->expire_at)->format('l d F Y')" />
		@endif

		@if($data['product']->feature->length)
			<x-product.feature icon="fas fa-ruler-horizontal" title="طول" :text="$data['product']->feature->length" />
		@endif

		@if($data['product']->feature->width)
			<x-product.feature icon="fas fa-ruler" title="عرض" :text="$data['product']->feature->width" />
		@endif

		@if($data['product']->feature->height)
			<x-product.feature icon="fas fa-ruler-vertical" title="ارتفاع" :text="$data['product']->feature->height" />
		@endif

		@if($data['product']->feature->diameter)
			<x-product.feature icon="fas fa-circle" title="قطر" :text="$data['product']->feature->diameter" />
		@endif

		@if($data['product']->feature->volume)
			<x-product.feature icon="fas fa-wine-bottle" title="حجم" :text="$data['product']->feature->volume" />
		@endif

		@if($data['product']->feature->purity)
			<x-product.feature icon="fas fa-prescription-bottle" title="درصد خلوص" :text="'%'.$data['product']->feature->purity"  />
		@endif

		@if($data['product']->feature->density)
			<x-product.feature icon="fas fa-heart" title="گرماژ" :text="$data['product']->feature->density" />
		@endif

		{{-- @if($data['product']->feature->company_id)
			<div class="cell">
				<div class="p-feature">
					<div class="grid-x">
						<div class="cell shrink"><i class="fas fa-hospital-user"></i></div>
						<div class="cell shrink"><div class="t">شرکت</div></div>
						<div class="cell auto"></div>
						<div class="cell shrink"><a href="{{ route('company', $data['product']->feature->company->slug) }}">{{$data['product']->feature->company->title}}</a></div>
					</div>
				</div>
			</div>
		@endif --}}

		@if($data['product']->feature->guarantee)
			<x-product.feature icon="fas fa-umbrella" title="مدت گارانتی" :text="$data['product']->feature->guarantee" />
		@endif

		@if($data['product']->feature->warranty)
			<x-product.feature icon="fas fa-history" title="مدت وارانتی" :text="$data['product']->feature->warranty" />
		@endif

		@if($data['product']->feature->kind)
			<x-product.feature icon="fas fa-pump-medical" title="نوع" :text="$data['product']->feature->kind" />
		@endif

		@if($data['product']->feature->mechanism)
			<x-product.feature icon="fas fa-cog" title="مکانیزم" :text="$data['product']->feature->mechanism" />
		@endif

		@if($data['product']->feature->operation)
			<x-product.feature icon="fas fa-heart" title="کارکرد" :text="$data['product']->feature->operation" />
		@endif

		@if($data['product']->feature->transport)
			<x-product.feature icon="fas fa-truck-pickup" title="سایز (نوع حمل)" :text="$data['product']->feature->transport" />
		@endif
	</div>	
</div>