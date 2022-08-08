<div class="grid-x">
	<div class="cell small-10 medium-shrink">
		<div class="meta">
			<div><span class="light">شماره سفارش:</span> SL-{{$invoice->id}}@if($invoice->pay_num)-{{$invoice->pay_num}}@endif</div>
			<div class="half-gap"></div>
			<div><span class="light">تاریخ:</span> {{$invoice->created_at}}</div>
		</div>
	</div>
	<div class="cell small-2 medium-auto">
		<div class="logo float-left">
			<img src="{{ URL::asset('/img/logo.svg') }}">
		</div>
	</div>
</div>