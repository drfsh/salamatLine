@if($data['category'])
    <div class="grid-container home-products home-section">

        <div class="titles">
            @foreach($data['category'] as $key => $item)
                <span class="item home-title-product-item @if($key==0) active @endif"
                      data-id="product-{{$item->id}}">{{$item->name}}</span>
                @if($key==2) @break @endif
            @endforeach
        </div>

        <div id="cart-slider">
            <Carousel :settings=" {itemsToShow: 1,snapAlign: 'center'}"
                      :breakpoints="{700: {itemsToShow: 3.5,snapAlign: 'center',},1024: {itemsToShow: 5,snapAlign: 'start',},}">
                <Slide v-for="slide in 10" :key="slide">
                    <div class="carousel__item">123</div>
                </Slide>
                <template #addons>
                    <Navigation/>
                </template>
            </Carousel>
            123456789
        </div>
    </div>
@endif