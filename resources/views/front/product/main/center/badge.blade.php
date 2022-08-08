<div class="box radius mb2 px1">
	<div class="gap"></div>
	<div class="grid-x grid-padding-x">
		<div class="cell shrink">
			<favorite :pid="{{$data['product']->id}}" @if($data['favorited'])active="1"@endif />
		</div>

		<div class="cell shrink">
			<share-product slug="{{url()->full()}}" />
		</div>

		<div class="cell shrink">
			<badge text="مقایسه" css="primary" icon="fas fa-exchange-alt" url="{{ route('Compare',$data['product']->slug) }}" />
		</div>

		@if($data['product']->featured)
			<div class="cell shrink">
				<badge text="برگزیده" css="secondary" icon="fas fa-check" url="{{ route('featured') }}" />
			</div>
		@endif

		@if(!$data['product']->discount->isEmpty())
			<div class="cell shrink">
				<badge text="دارای تخفیف" css="warning" icon="fas fa-tag" url="{{ route('discount') }}" />
			</div>
		@endif
		
		@if(!$data['product']->inventory->isEmpty() && $data['product']->inventory[0]->qty > 0)
			<div class="cell shrink">
				<badge text="موجود در انبار" css="success" icon="fas fa-truck-loading" url="#" />
			</div>
		@endif
	</div>
</div>