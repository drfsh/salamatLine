<div class="grid-x">
    <div data="content{{$item->id}}" class=" cell auto"><h4 data="content{{$item->id}}" class="accordion2">{{ $item->name }}</h4></div>
    <div class="cell shrink">
        {{ Form::open(['route' => ['category.destroy', $item->id],'class' => 'edit', 'method' => 'DELETE','onsubmit' => 'return confirm("از حذف این دسته بندی به صورت برگشت‌ناپذیر اطمینان دارید؟")']) }}
        <a data="show_option{{$item->id}}" class="option ellipsis"><i data="show_option{{$item->id}}" class="fas fa-ellipsis-v ellipsis"></i></a>
        <div class="option body" id="show_option{{$item->id}}">
            <a class="item" href="{{ route('hideCategory',$item->id) }}">
                @if($item->hide)
                    <span>لغو پنهان</span>
                @else
                    <span>پنهان کردن</span>
                @endif
            </a>
            <a class="item" href="{{ route('hideCategoryPrice',$item->id) }}"><span>مخفی کردن قیمت محصولات</span></a>
            <a class="item" href="{{ route('hideCategory',$item->id) }}"><span>نمایش قیمت محصولات</span></a>
        </div>
        <a href="{{ route('category', $item->slug) }}" target="_blank"><i class="fas fa-eye"></i></a>
        <a href="{{ route('category.edit', $item->id) }}"><i class="fas fa-edit"></i></a>
        <a href="{{ route('UpCategory', $item->id) }}" class="green"><i class="fas fa-long-arrow-alt-up"></i></a>
        <a href="{{ route('DownCategory', $item->id) }}" class="green"><i class="fas fa-long-arrow-alt-down"></i></a>
        <button type="submit" class="red" value="Delete">
            <i class="fas fa-trash"></i>
        </button>
        {!! Form::close() !!}
    </div>
</div>