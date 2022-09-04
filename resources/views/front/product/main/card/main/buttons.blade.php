<div class="buttons">
    <product-buttons
            featured="{{$data['product']->featured}}"
            active="{{$data['product']->active}}"
            discounted="{{!$data['product']->discount->isEmpty()}}"
            @if(!$data['product']->discount->isEmpty()) percent="{{$data['product']->discount[0]->percent}}" @endif
            admin="{{Auth::check() && Auth::user()->hasRole('Admin')}}"
            editroute="{{route('product.edit', $data['product']->id)}}"
            id="{{$data['product']->id}}"
            slug="{{$data['product']->slug}}"
            img="{{$data['product']->tiny}}"
            name="{{$data['product']->title}}"
            @if($data['favorited'])isfavorited="1"@endif
    >
    </product-buttons>
</div>
