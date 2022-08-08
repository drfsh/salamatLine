<div class="total">
	<div class="light">
		<small>
			<span class="number">جمع کل: {{number_format($invoice->sub_total)}}</span>
		</small>
	</div>
	<div class="light">
		<small>
			<span class="number">هزینه ارسال: {{number_format($invoice->shipping)}}</span>
		</small>
	</div>
{{-- 	<div class="light">
		<small>
			<span class="number">مالیات: {{number_format($invoice->sub_total * 0.09)}}</span>
		</small>
	</div> --}}
	@if($invoice->detail && $invoice->detail->discount)
		<div class="light">
			<small>
				<span class="number">تخفیف: {{number_format($invoice->detail->discount)}}
					{{-- @if($invoice->coupon_id)<small>({{$invoice->coupon->code}})</small>@endif --}}
				</span>
			</small>
		</div>
	@endif
	<div class="gt">
		<span class="number">قابل پرداخت: {{number_format($invoice->grand_total)}}</span> ریال
	</div>
</div>