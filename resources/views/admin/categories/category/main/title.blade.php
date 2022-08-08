<div class="grid-x">
	<div class="cell auto"><h4>{{ $item->name }}</h4></div>
	<div class="cell shrink">    
		{{ Form::open(['route' => ['category.destroy', $item->id],'class' => 'edit', 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
		<a href="{{ route('category', $item->slug) }}" target="_blank"><i class="fas fa-eye"></i></a>
		<a href="{{ route('category.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
		<a href="{{ route('UpCategory', $item->id) }}" class="green"><i class="fas fa-long-arrow-alt-up"></i></a>
		<a href="{{ route('DownCategory', $item->id) }}" class="green"><i class="fas fa-long-arrow-alt-down"></i></i></a>
		<button type="submit" class="red"  value="Delete">
			<i class="fas fa-trash"></i>
		</button>
		{!! Form::close() !!}
	</div>
</div>