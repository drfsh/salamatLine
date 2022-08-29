@if(sizeof($data['browser'])>0)
<div class="card-3-part" >
    <div class="c1">مرورگر ها</div>
    <div class="n2 b-l-none">  ({{$data['browser'][0]['sessions']}}) عدد  {{$data['browser'][0]['browser']}}</div>
    <div class="n2 ">@if(sizeof($data['browser'])>1)  ({{$data['browser'][1]['sessions']}}) عدد  {{$data['browser'][1]['browser']}} @endif</div>
    <div class="n2 b-r-none">@if(sizeof($data['browser'])>2)  ({{$data['browser'][2]['sessions']}}) عدد  {{$data['browser'][2]['browser']}} @endif</div>
</div>
@endif
