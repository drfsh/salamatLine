@if(sizeof($data['pages'])>0)
    <div class="card-3-part b">
    <div class="c1">صفحات برتر</div>

        @foreach($data['pages'] as $item)
            <div class="n2 p b-l-none">
                <a href="{{$item['url']}}" target="_blank">
                    <div class="text-l">{{$item['pageTitle']}}</div>
                </a>
                <div>{{$item['pageViews']}} بازدید </div>
            </div>
        @endforeach

</div>
@endif
