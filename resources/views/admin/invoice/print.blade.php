<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" dir="rtl">
	<head>
		@include('admin.global.head.main')
		<style type="text/css">
			body{
				background: #fff !important;
				color:black !important;
			}
			.a-box{
				border:6px double black;
				padding:6px;
				position: relative;
			}
			.a-box .body{
				padding: 2rem;
			}
			img{
				height: 30px;
				-webkit-filter: grayscale(100%); /* Safari 6.0 - 9.0 */
				filter: grayscale(100%);
			}
			.logo{
				position: absolute;
				top: 1rem;
				right: 1rem;
			}
			ul{
				margin:0;
			}
			li{
				list-style-type: none;
			}
			.slug{
				position: absolute;
				bottom: 0;
				left: 6px;
			}
			.box-holder{
				position: absolute;
				bottom: 7px;
				right: 8px;
				font-size: 70%;
				border-radius: 6px;
			}
			.box-holder > span {
				border: 1px solid #000;
				padding: 2px 0.390625rem;
				color: #000;
				line-height: 1;
			}
		</style>
	</head>
	<body>
		<div id="app">
			<div class="double-gap"></div>
			<div class="grid-container">
				<div class="grid-x">
					<div class="cell medium-8 medium-offset-2">
						<div class="a-box">
							{{-- <div class="slug">{!! $qr !!}</div> --}}
							<div class="logo">
								<img src="{{ URL::asset('/img/logo.svg') }}">
							</div>
							<div class="double-gap"></div>
							<div class="double-gap"></div>
							<div class="">
								<span>فرستنده: تهران، خیابان ولیعصر، بالاتر از جامی، پلاک 1070</span><br>
								<p>02166462985 - 09121796138</p>
							</div>
							<div class="body">
								<span>گیرنده:</span><br>

								<div class="address light">

									<div class="box-holder">
									@if($invoice->address->province_id)<span>استان: <b>{{$invoice->address->province->title}}</b></span>@endif
									@if($invoice->address->city_id)<span>شهر: <b>{{$invoice->address->city->title}}</b></span>@endif
									@if($invoice->address->district_id)<span>محله: <b>{{$invoice->address->district->title}}</b></span>@endif
									</div>
									@if($invoice->address->content)
										<b>{{$invoice->address->content}}</b>
									@endif
									@if($invoice->address->zipcode)
										<br><small>کدپستی: {{$invoice->address->zipcode}}</small>
									@endif
									<div class="gap"></div>		
									<ul>
										
										<li><span>نام شخص:  </span>@if($invoice->user->name){{$invoice->user->name}}@endif @if($invoice->user->lname){{$invoice->user->lname}}@endif @if($invoice->address->name)({{$invoice->address->name}})@endif</li>
										
										@if($invoice->address->mobile)
										<li>تلفن تماس: <b>{{$invoice->address->mobile}}</b></li>
										@endif
									</ul>
									<div class="double-gap">
										<ul>
											<li><small>شماره سفارش: </small><b>SL-{{$invoice->id}}-{{$invoice->pay_num}}</b></li>
										</ul>
									</div>
								</div>

							</div>
						</div>
						<div class="gap"></div>
						<div class="text-center"><small>لطفا استان و شهر انتخابی با آدرس اصلی چک شود</small></div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
