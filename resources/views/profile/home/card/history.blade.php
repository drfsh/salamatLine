<div class="bbox mt-3">
    <div class="title">کالاهایی ک امروز دیده اید</div>

    <div class="grid-x p-12">
        @forelse($data['most_view'] as $key => $item)
            @if($key==3) @break @endif
            <div class="cell small-6 medium-4 large-4">@include('front.product.holder.item.main')</div>
        @empty
            <div class="cell">
                <div class="callout warning">هیچ محصولی در این دسته‌بندی تعریف نشده است.</div>
            </div>
        @endforelse
    </div>
</div>
