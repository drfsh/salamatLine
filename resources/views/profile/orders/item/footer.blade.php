<div class="footer">
	<ul>
		<li class="light"><small>جمع خرید: {{number_format(($item->sub_total)/10)}}</small></li>
		@if($item->shipping)
			<li class="light"><small>هزینه ارسال: {{number_format(($item->shipping)/10)}}</small></li>
		@endif
		@if($item->detail && $item->detail->discount)
			<li class="light"><small>تخفیف:<span> {{number_format($item->detail->discount/10)}}</small></span></li>
		@endif
		<li><small>مبلغ قابل پرداخت:</small><b> {{number_format($item->grand_total/10)}}</b></li>
	</ul>
</div>