@if(!$item2->children->isEmpty())
<ul class="sub">
	@foreach($item2->children as $item3)
		<li>
			<a href="">{{$item3->name}}</a>
			{{ Form::open(['route' => ['category.destroy', $item3->id],'class' => 'edit', 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
				<a href="{{ route('category', $item3->slug) }}" target="_blank"><i class="fas fa-eye"></i></a>
				<a href="{{ route('category.edit', $item3->id) }}"><i class="fas fa-edit"></i></a>
				<a href="{{ route('UpCategory', $item3->id) }}" class="green"><i class="fas fa-long-arrow-alt-up"></i></a>
				<a href="{{ route('DownCategory', $item3->id) }}" class="green"><i class="fas fa-long-arrow-alt-down"></i></i></a>
				<button type="submit" class="red" value="Delete">
					<i class="fas fa-trash"></i>
				</button>
			{!! Form::close() !!}                                        
		</li>
	@endforeach
</ul>
@else
	<div class="callout warning">
		زیرمجموعه ندارد
	</div>
@endif