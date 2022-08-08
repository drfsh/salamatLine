<div class="grid-x grid-padding-x small-up-2 medium-up-3 large-up-4">
	<div class="cell">
		<x-admin.card color="y18" icon="fab fa-codepen" subtitle="افراد در انتظار" title="{{$data['total']}}" footer=""  />
	</div>
	<div class="cell">
		<x-admin.card color="y14" icon="fas fa-database" subtitle="اطلاع رسانی شده" title="{{$data['total_notified']}}"  />
	</div>
</div>