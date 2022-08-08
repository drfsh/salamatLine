<div class="grid-x small-up-2 medium-up-6 date-holder">
	<div class="cell">
		<div class="d-box">
			ایجاد:
			<span>{{$invoice->created_at}}</span>
		</div>
	</div>

	
	<div class="cell">
		<div class="d-box s">
			پرداخت:
			@if($invoice->pay_date)
				<span>{{$invoice->pay_date}}</span>
			@else
				-
			@endif
		</div>
	</div>

	<div class="cell">
		<div class="d-box w">
			تولید:
			@if($invoice->production_date)
				<span>{{Verta($invoice->production_date)->format('l %d %B %Y - H:i')}}</span>
			@else
				-
			@endif
		</div>
	</div>

	<div class="cell">
		<div class="d-box wa">
			پایان تولید:
			@if($invoice->getready_date)
				<span>{{Verta($invoice->getready_date)->format('l %d %B %Y - H:i')}}</span>
			@else
				-
			@endif
		</div>
	</div>

	<div class="cell">
		<div class="d-box se">
			ارسال:
			@if($invoice->send_date)
				<span>{{Verta($invoice->send_date)->format('l %d %B %Y - H:i')}}</span>
			@else
				-
			@endif
		</div>
	</div>

	<div class="cell">
		<div class="d-box v">
			تایید دریافت:
			@if($invoice->finish_date)
				<span>{{Verta($invoice->finish_date)->format('l %d %B %Y - H:i')}}</span>
			@else
				-
			@endif
		</div>
	</div>
	
</div>