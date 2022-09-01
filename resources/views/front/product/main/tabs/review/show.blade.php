<div class="comment-show product-info">
    <div class="title line-blue">{{$data['product']->getApprovedRatings($data['product']->id, 'desc')->count()}} دیدگاه
        برای این محصول ثبت شده است
    </div>
    <div class="body">
        @foreach ($data['product']->getApprovedRatings($data['product']->id, 'desc') as $item)

            <div class="item">
                <div class="info">
                    <img src="{{$item->author->avatar}}">
                    <div class="user-info">
                        <div class="user-name">
                            <span>{{$item->author->name}} - </span>
                            <span>{{$item->created_at}}</span>
                        </div>
                        <div>
                            <range-star :value="{{$item->rating*20}}"></range-star>
                        </div>
                    </div>
                </div>
                <div>
                    <p>
                        {{$item->body}}
                    </p>
                </div>
            </div>
        @endforeach
    </div>
</div>
