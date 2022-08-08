@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('cart') }}
	<div class="double-gap"></div>
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell large-6 large-offset-3">
				<div class="callout text-center {{$data['color']}}">
					<div class="anime">
						@if($data['animation'] == 'face')
							<div class="{{$data['animation']}}">
								<div class="eye"></div>
								<div class="eye right"></div>
								<div class="mouth happy"></div>
							</div>
							<div class="shadow scale"></div>

						@else
							<div class="{{$data['animation']}}">
								<div class="eye"></div>
								<div class="eye right"></div>
								<div class="mouth sad"></div>
							</div>
							<div class="shadow move"></div>

						@endif
					</div>
					<h1>{{$data['title']}}</h1>
					<div class="gap"></div>
					<p>{{$data['msg']}}</p>
					<p class="text-center"><span>شماره سفارش: </span><b>{{$data['number']}}</b></p>
				</div>
			</div>
			<div class="cell medium-8 large-6 medium-offset-2 large-offset-3">
				
				<div class="grid-x grid-padding-x small-up-2">
					<div class="cell"><a href="{{ route('ProfileOrders') }}" class="button expanded {{$data['color']}}">مشاهده سفارشات</a></div>
					<div class="cell"><a href="{{ route('home') }}" class="button expanded hollow {{$data['color']}}">بازگشت به صفحه نخست</a></div>
				</div>


			</div>
		</div>
	</div>
@endsection