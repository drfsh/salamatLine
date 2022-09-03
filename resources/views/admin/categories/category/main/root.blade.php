<div class="box shadow rounded hover space">
	<div class="heading @if($item->hide) bg-ani  @endif">@include('admin.categories.category.main.title')</div>
	<div  id="content{{$item->id}}" class="accordion2-body content">@include('admin.categories.category.main.content')</div>
</div>