@if($data['product']->active)
    <div id="product-add-cart">

        <product-add-cart
                singleprice="{{$data['product']->price}}"
                multiprice="{{$data['product']['multiprice']}}"
                multifeature="{{$data['product']['multifeature']}}"
                discount="{{$data['product']['discount']}}">
        </product-add-cart>
    </div>

    <add-cart v-show="true"
              :pid="{{$data['product']->id}}"
              :multiprice="{{$data['product']['multiprice']}}"
              :multifeature="{{$data['product']['multifeature']}}"
              :singleprice="'{{$data['product']->price}}'"
              :discount="{{$data['product']['discount']}}"
              redirect="{{ url()->current() }}"
              :auth="{{ !empty(Auth::user()->id) ? Auth::user()->id : '0' }}"
    />
@else
    <div class="mw-300 diactive">
        <product-diactive :id="{{$data['product']->id}}"></product-diactive>
    </div>
@endif