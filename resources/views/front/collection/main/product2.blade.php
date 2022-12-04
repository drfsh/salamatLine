<div class="grid-container">
    <div class="grid-x grid-padding-x ">
        <div class="cell">
            <div class="double-gap"></div>
            <div class="grid-x grid-padding-x ">
                @foreach($data['products'][1] as $i=>$item)
                    <div class="cell small-2 medium-4 large-3">@include('front.product.holder.item.main')</div>
                @endforeach
            </div>
            <div class="double-gap"></div>
        </div>
    </div>
</div>