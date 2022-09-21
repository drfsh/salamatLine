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
                            <span>{{Verta($item->created_at)->format('H:i Y/m/d')}}</span>
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

                @if($item->replay!=null && $item->replay!='')
                    <div class="item" style="background: #f2f6fc;">
                        <div class="info">
                            <img src="/img/profile/default.jpg">
                            <div class="user-info">
                                <div class="user-name">
                                    <span>ادمین - </span>
                                    <span>{{Verta($item->updated_at)->format('H:i Y/m/d')}}</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <p>
                                {{$item->replay}}
                            </p>
                        </div>
                    </div>
                @endif

            </div>
        @endforeach
    </div>
</div>
