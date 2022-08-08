<div class="grid-x grid-padding-x">
    <div class="cell medium-6">
        {{ Form::label('featured_image', 'تصویر اصلی') }}
        {{ Form::file('featured_image') }}
    </div>
    <div class="cell medium-6">
        {{ Form::label('photos', 'دیگر تصاویر') }}
        {{ Form::file('photos[]', ['multiple' => 'multiple']) }}
    </div>
    <div class="cell medium-6">
        <img src="{{$product->tiny}}">
        @if($product->tiny == NULL)
        @else
            <a class="button tiny warning" href="{{ route('DeleteImage', $product->id) }}">حذف</a>
        @endif
    </div>
    <div class="cell medium-6">
        <div class="grid-x grid-padding-x small-up-2 medium-up-4 large-up-6">
            @foreach($product->photos as $item)
                <div class="cell">
                    <div class="edit-image">
                        <img src="{{$item->small}}">
                        <a class="button tiny warning" href="{{ route('DeleteMulti', $item->id) }}">حذف</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
