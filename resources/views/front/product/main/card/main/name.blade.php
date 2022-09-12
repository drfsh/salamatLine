<div class="name">
    <h1>{{$data['product']->title}}@if($data['product']->subtitle) ({{$data['product']->subtitle}})@endif</h1>
</div>
<div class="name-en">
		<span role="button" class="zm">
			@include('icons.shield')
			تضمین اصالت کالا
		</span>
    @if($data['product']->title_en!==null)
        <span class="nm">
			{{$data['product']->title_en}}
		</span>
    @endif
</div>