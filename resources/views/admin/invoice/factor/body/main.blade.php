<div class="invoice-box">
	@include('admin.invoice.factor.body.head')
	<hr class="light full">
	@include('admin.invoice.factor.body.meta')
	<div class="double-gap"></div>

	<div class="grid-x">
		<div class="cell">	
			<div class="large-table">
				<table class="hover table-bordered">
					@include('admin.invoice.factor.body.tableheading')
					@foreach($invoice->orders as $order)
						@include('admin.invoice.factor.body.Item')
					@endforeach
				</table>
			</div>
		</div>
		<div class="cell medium-5 medium-offset-7">
			@include('admin.invoice.factor.body.Total')
		</div>
	</div>
</div>
<div class="double-gap"></div>
<div class="callout alert">
<ol>
	<li><b>تغییر وضعیتِ فاکتورها در تمامی مراحل موجبِ ارسال پیامک برای صاحب فاکتور می‌شود.</b></li>
	<li>توجه داشته باشید که برخی کاربران استان شهر و یا محله‌ی خود را اشتباه انتخاب می‌کنند، لطفا این سه مورد را با آدرس اصلی چک نمایید.</li>
</ol>
</div>