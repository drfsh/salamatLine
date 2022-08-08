<div class="box total-purchase text-center">
	<div class="b n1"><b>کل:</b><span>{{number_format($data['total_income'])}}</span><small>تومان</small></div>
	<div class="b n2"><b>خالص:</b><span>{{number_format($data['pure_income'])}}</span><small>تومان</small></div>
	<div class="b n3"><b>هزینه حمل:</b><span>{{number_format($data['total_shipping'])}}</span><small>تومان</small></div>
	<div class="grid-x n4">
		<div class="cell medium-6"><div class="b sub1"><b>آنلاین:</b><span>{{number_format($data['online_income'])}}</span><small>تومان</small></div></div>
		<div class="cell medium-6"><div class="b sub2"><b>فاکتور:</b><span>{{number_format($data['factor_income'])}}</span><small>تومان</small></div></div>
	</div>
</div>