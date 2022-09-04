<product-is-add-card name="{{$data['product']->title}}"></product-is-add-card>
<div class="box3 product-box">
    @include('front.product.main.card.main.buttons')
    <div class="mw-p">
        <div class="grid-x grid-padding-x">

            <div class="right-new-123-1">
                @include('front.product.main.card.main.right.main')
            </div>
            <div class="left-sepoid-product">
                <div class="sepid-offer-403">
                    @include('front.product.main.card.main.name')
                </div>
                <div class="left-two-p-sepid">
                    @include('front.product.main.card.main.center.main')
                </div>
                <div class="right-two-p-sepid-asli">
                    @include('front.product.main.card.main.left.main')
                </div>
            </div>
        </div>
    </div>
</div>