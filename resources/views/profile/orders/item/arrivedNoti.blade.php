@if($item->situation == 'arrived')
	<div class="cell">
		<div class="callout secondary text-center">
			
			<p>سفارش شما ارسال گردیده و به زودی به دستتان می‌رسد لطفا پس از دریافت و تایید سفارشات بر روی دکمه‌ی پایان سفارش کلیک کنید. در غیر این صورت وضعیت این سفارش پس از 24 ساعت به حالت پایان تغییر می‌یابد.</p>

			<div class="gap"></div>

		    {!! Form::open(['method' => 'POST', 'route' => ['SuccessInvoice', $item->id]]) !!}
		        <button type="submit" class="button">
		           سفارشات با موفقیت به دستم رسید
		        </button>
		    {!! Form::close() !!}		
		</div>

	</div>
@endif