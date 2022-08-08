<div class="grid-x grid-padding-x">
	<div class="cell medium-shrink">
		@if($invoice->user->name)
			<div>نام: {{$invoice->user->name}} @if($invoice->user->lname){{$invoice->user->lname}}@endif</div>
		@endif

		@if($invoice->user->nationalcode)
			<div>کدملی: {{$invoice->user->nationalcode}}</div>
		@endif

		@if($invoice->user->email)
			<div>ایمیل: {{$invoice->user->email}}</div>
		@endif
	</div>
	<div class="cell medium-auto">
		@if($invoice->address_id)
		<div class="address light">
			<ul>
				@if($invoice->address->name)
				<li>تحویل گیرنده: {{$invoice->address->name}}</li>
				@endif
				@if($invoice->address->mobile)
				<li>تلفن تماس: {{$invoice->address->mobile}}</li>
				@endif
			</ul>
			
			<div class="box-holder">
			@if($invoice->address->province_id)<span>استان: <b>{{$invoice->address->province->title}}</b></span>@endif
			@if($invoice->address->city_id)<span>شهر: <b>{{$invoice->address->city->title}}</b></span>@endif
			@if($invoice->address->district_id)<span>محله: <b>{{$invoice->address->district->title}}</b></span>@endif
			</div>
			@if($invoice->address->content)
			آدرس: {{$invoice->address->content}}
			@endif
			<br>
			@if($invoice->address->zipcode)
				کدپستی: {{$invoice->address->zipcode}}
			@endif			
		</div>
		@endif
	</div>
</div>