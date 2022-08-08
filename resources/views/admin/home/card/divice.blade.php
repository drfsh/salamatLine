<div class="card-3-part">
    <div class="c1">صفحات برتر</div>
    <div class="n2 p b-l-none">
        <a href="{{$data['pages'][0]['url']}}" target="_blank">
            <div class="text-l">{{$data['pages'][0]['pageTitle']}}</div>
        </a>
        <div>{{$data['pages'][0]['pageViews']}} بازدید </div>
    </div>
    <div class="n2 p">
        <a href="{{$data['pages'][1]['url']}}" target="_blank">
            <div class="text-l">{{$data['pages'][1]['pageTitle']}}</div>
        </a>
        <div>{{$data['pages'][1]['pageViews']}} بازدید </div>
    </div>
    <div class="n2 p b-r-none">
        <a href="{{$data['pages'][2]['url']}}" target="_blank">
            <div class="text-l">{{$data['pages'][2]['pageTitle']}}</div>
        </a>
        <div> {{$data['pages'][2]['pageViews']}} بازدید </div>
    </div>
</div>
