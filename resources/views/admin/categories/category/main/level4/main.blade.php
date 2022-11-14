@if(!$item3->children->isEmpty())
<ul class="sub">
	@foreach($item3->children as $item4)
		<li>
			<a href="{{route('category', $item4->slug)}}" class=" @if($item4->hide) bg-ani  @endif">{{$item4->name}}</a>
			{{ Form::open(['route' => ['category.destroy', $item4->id],'class' => 'edit', 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
			<a data="show_option{{$item4->id}}" class="option ellipsis"><i data="show_option{{$item4->id}}" class="fas fa-ellipsis-v ellipsis"></i></a>
			<div class="option body" id="show_option{{$item4->id}}">
				<a class="item" href="{{ route('hideCategory',$item4->id) }}">
					@if($item4->hide)
						<span>لغو پنهان</span>
					@else
						<span>پنهان کردن</span>
					@endif
				</a>
				<a class="item" href="{{ route('hideCategoryPrice',$item4->id) }}"><span>مخفی کردن قیمت محصولات</span></a>
				<a class="item" href="{{ route('showCategoryPrice',$item4->id) }}"><span>نمایش قیمت محصولات</span></a>
			</div>
				<a href="{{ route('category', $item4->slug) }}" target="_blank"><i class="fas fa-eye"></i></a>
				<a href="{{ route('category.edit', $item4->id) }}"><i class="fas fa-edit"></i></a>
				<a href="{{ route('UpCategory', $item4->id) }}" class="green"><i class="fas fa-long-arrow-alt-up"></i></a>
				<a href="{{ route('DownCategory', $item4->id) }}" class="green"><i class="fas fa-long-arrow-alt-down"></i></a>
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
