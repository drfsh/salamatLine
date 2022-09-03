@if(sizeof($data['userTypes'])>0)
    <div class="card-3-part">
    <div class="c1">کاربران آنلاین</div>
    <div class="c2">{{$data['userTypes'][1]['sessions']}} نفر لاگین شدن </div>
    <div class="c3">{{$data['userTypes'][0]['sessions']}} لاگین نشدن </div>
</div>
@endif
