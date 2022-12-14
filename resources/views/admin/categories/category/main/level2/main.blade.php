<li class="accordion-item" data-accordion-item>
	<a class="accordion-title @if($item2->hide) bg-ani  @endif">{{$item2->name}}</a>
	<div class="accordion-content" data-tab-content>
		<div class="bar">
			{{ Form::open(['route' => ['category.destroy', $item2->id],'class' => 'edit', 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
			<a data="show_option{{$item2->id}}" class="option ellipsis"><i data="show_option{{$item2->id}}" class="fas fa-ellipsis-v ellipsis"></i></a>
			<div class="option body" id="show_option{{$item2->id}}">
				<a class="item" href="{{ route('hideCategory',$item2->id) }}">
					@if($item2->hide)
						<span>لغو پنهان</span>
					@else
						<span>پنهان کردن</span>
					@endif
				</a>
				<a class="item" href="{{ route('hideCategoryPrice',$item2->id) }}"><span>مخفی کردن قیمت محصولات</span></a>
				<a class="item" href="{{ route('showCategoryPrice',$item2->id) }}"><span>نمایش قیمت محصولات</span></a>
			</div>
			<a href="{{ route('category', $item2->slug) }}" target="_blank"><i class="fas fa-eye"></i></a>
			<a href="{{ route('category.edit', $item2->id) }}"><i class="fas fa-edit"></i></a>
			<a href="{{ route('UpCategory', $item2->id) }}" class="green"><i class="fas fa-long-arrow-alt-up"></i></a>
			<a href="{{ route('DownCategory', $item2->id) }}" class="green"><i class="fas fa-long-arrow-alt-down"></i></a>
			<button type="submit" class="red" value="Delete">
				<i class="fas fa-trash"></i>
			</button>
			{!! Form::close() !!}
		</div>
		@include('admin.categories.category.main.level3.main')
	</div>
</li>
