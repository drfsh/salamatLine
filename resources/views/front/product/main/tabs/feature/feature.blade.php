<div class="product-info">
	<div class=title>توضیحات تکمیلی</div>

	<div id="app-feature-item">

		@if($data['product']->feature->material_id && $data['product']->feature->is_material_id)
			<feature-item icon="far fa-clone" title="جنس" text="{{$data['product']->feature->material->title}}"></feature-item>
		@endif

		@if($data['product']->feature->weight && $data['product']->feature->is_weight)
			<feature-item icon="fas fa-weight" title="وزن" text="{{$data['product']->feature->weight}}"></feature-item>
		@endif

		@if($data['product']->feature->numberin && $data['product']->feature->is_numberin)
			<feature-item icon="fas fa-box" title="تعداد در بسته" text="{{$data['product']->feature->numberin}}"></feature-item>
		@endif

		@if($data['product']->feature->expire_at && $data['product']->feature->is_expire_at)
			<feature-item icon="fas fa-calendar-day" title="تاریخ انقضا" text="{{Verta($data['product']->feature->expire_at)->format('l d F Y')}}"></feature-item>
		@endif

		@if($data['product']->feature->length && $data['product']->feature->is_length)
			<feature-item icon="fas fa-ruler-horizontal" title="طول" text="{{$data['product']->feature->length}}"></feature-item>
		@endif

		@if($data['product']->feature->width && $data['product']->feature->is_width)
			<feature-item icon="fas fa-ruler" title="عرض" text="{{$data['product']->feature->width}}"></feature-item>
		@endif

		@if($data['product']->feature->height && $data['product']->feature->is_height)
			<feature-item icon="fas fa-ruler-vertical" title="ارتفاع" text="{{$data['product']->feature->height}}"></feature-item>
		@endif

		@if($data['product']->feature->diameter && $data['product']->feature->is_diameter)
			<feature-item icon="fas fa-circle" title="قطر" text="{{$data['product']->feature->diameter}}"></feature-item>
		@endif

		@if($data['product']->feature->volume && $data['product']->feature->is_volume)
			<feature-item icon="fas fa-wine-bottle" title="حجم" text="{{$data['product']->feature->volume}}"></feature-item>
		@endif

		@if($data['product']->feature->purity && $data['product']->feature->is_purity)
			<feature-item icon="fas fa-prescription-bottle" title="درصد خلوص" text="'%'.{{$data['product']->feature->purity}}"></feature-item>
		@endif

		@if($data['product']->feature->density && $data['product']->feature->is_density)
			<feature-item icon="fas fa-heart" title="گرماژ" text="{{$data['product']->feature->density}}"></feature-item>
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

		@if($data['product']->feature->guarantee && $data['product']->feature->is_guarantee)
			<feature-item icon="fas fa-umbrella" title="مدت گارانتی" text="{{$data['product']->feature->guarantee}}"></feature-item>
		@endif

		@if($data['product']->feature->warranty && $data['product']->feature->is_warranty)
			<feature-item icon="fas fa-history" title="مدت وارانتی" text="{{$data['product']->feature->warranty}}"></feature-item>
		@endif

		@if($data['product']->feature->kind && $data['product']->feature->is_kind)
			<feature-item icon="fas fa-pump-medical" title="نوع" text="{{$data['product']->feature->kind}}"></feature-item>
		@endif

		@if($data['product']->feature->mechanism && $data['product']->feature->is_mechanism)
			<feature-item icon="fas fa-cog" title="مکانیزم" text="{{$data['product']->feature->mechanism}}"></feature-item>
		@endif

		@if($data['product']->feature->operation && $data['product']->feature->is_operation)
			<feature-item icon="fas fa-heart" title="کارکرد" text="{{$data['product']->feature->operation}}"></feature-item>
		@endif

		@if($data['product']->feature->transport && $data['product']->feature->is_transport)
			<feature-item icon="fas fa-truck-pickup" title="سایز (نوع حمل)" text="{{$data['product']->feature->transport}}"></feature-item>
		@endif
	</div>

</div>