<div class="c-100" style="margin-top: 60px;">
    <div class="p-title">
        <h4>تیم فروشگاه سلامت لاین</h4>
    </div>

    <div class="flex-column box-info box-info-user">
        @foreach($data['users'] as $v)
        <div class="item">
            <img src="/img/page/{{$v->img}}">
            <div class="text">
                <span class="name">{{$v->name}}</span>
                <span class="role">{{$v->info}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
