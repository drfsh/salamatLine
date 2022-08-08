@extends('layouts.admin')

@section('content')
	<div class="double-gap"></div>
	@include('admin.home.card')

	<div class="grid-x grid-padding-x">

        <div class="cell medium-4">
            @include('admin.home.card.users')
        </div>
        <div class="cell medium-4">
            @include('admin.home.card.browsers')
        </div>
        <div class="cell medium-4">
            @include('admin.home.card.divice')
        </div>

        <div class="cell medium-6">
            @include('admin.report.main.total')
        </div>
        <div class="cell medium-3">
            @include('admin.report.main.steps')
        </div>
        <div class="cell medium-3">
            @include('admin.home.card.time')
        </div>
<hr style="height: 25px;width: 100%;">
        <div class="cell">
            <form action="{{route('admin')}}" method="get" id="form">
                <div>
                    <span>گرفتن آمار:</span>
                    <input class="input-days-admin m-0" id="days" type="text" name="days" value="{{$days}}">
                    <span style="font-size: 12px;">روز اخیر</span>
                    <button class="btn float-left" type="submit">بازیابی آمار</button>
                </div>
            </form>
        </div>
        <hr style="width: 100%;">
        <div class="cell medium-4">
			@include('admin.home.mostvisit.product')
		</div>
		<div class="cell medium-4">
			@include('admin.home.mostvisit.category')
		</div>
		<div class="cell medium-4">
			@include('admin.home.mostvisit.brand')
		</div>
	</div>

@endsection
