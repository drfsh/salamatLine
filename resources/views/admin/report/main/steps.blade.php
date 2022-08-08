<div class="box steps text-center">
	<div class="b n1"><b>پرداخت اولیه:</b><span>{{number_format($data['paid_income'])}}</span><small>تومان</small></div>
	<div class="b n2"><b>آماده‌سازی:</b><span>{{number_format($data['paid_production'])}}</span><small>تومان</small></div>
{{-- 	<div class="b n3"><b>آماده ارسال:</b><span>{{number_format($data['paid_sending'])}}</span><small>تومان</small></div> --}}
	<div class="b n3"><b>ارسال‌شده:</b><span>{{number_format($data['paid_sending'])}}</span><small>تومان</small></div>
	<div class="b n4"><b>در انتظار تایید:</b><span>{{number_format($data['paid_arrived'])}}</span><small>تومان</small></div>
	<div class="b n5"><b>پایان همه مراحل:</b><span>{{number_format($data['paid_finish'])}}</span><small>تومان</small></div>
</div>