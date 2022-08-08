<div class="grid-x grid-padding-x small-up-2 medium-up-4">
	<div class="cell"><x-admin.card color="y18" icon="fas fa-pallet" subtitle="کیفیت" title="{{round($data['avg_q'], 3)}}"  /></div>
	<div class="cell"><x-admin.card color="y14" icon="fas fa-dollar-sign" subtitle="قیمت" title="{{round($data['avg_p'], 3)}}" /></div>
    <div class="cell"><x-admin.card color="y18" icon="fas fa-dolly" subtitle="حمل و نقل" title="{{round($data['avg_t'], 3)}}"  /></div>
    <div class="cell"><x-admin.card color="y18" icon="fab fa-codepen" subtitle="مجموع" title="{{round($data['avg_o'], 3)}}"  /></div>
</div>