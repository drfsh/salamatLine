@extends('layouts.admin')
@section('NavItems')
	@include('admin.report.NavItems')
@endsection
@section('content')

<div class="double-gap"></div>

<div class="title_b">گزارشات</div>
<div class="grid-x grid-padding-x">
	<div class="cell medium-4">
		@include('admin.report.main.total')
	</div>
	<div class="cell medium-4">
		@include('admin.report.main.steps')
	</div>
	<div class="cell medium-4">@include('admin.report.main.time')</div>
    <div class="double-gap"></div>

    <div class="cell medium-6">
		@include('admin.report.main.MostSellPrice')
	</div>
	<div class="cell medium-6">
		<div class="double-gap"></div>
		@include('admin.report.main.MostSell')
	</div>
</div>



@endsection
