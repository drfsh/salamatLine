@extends('layouts.admin')

@section('NavItems')

@endsection


@section('headScript')
	<link rel="stylesheet" type="text/css" media="print" href="{{ mix('css/print/app.css') }}">
@endsection

@section('content')
	@include('admin.invoice.factor.date')
	<div class="grid-x">
		<div class="cell medium-10 medium-offset-1">
			<div class="double-gap"></div>
			<a class="button alert hollow" href="{{route('AdminInvoice')}}">بازگشت</a>
			<div class="double-gap"></div>
			@include('admin.invoice.factor.body.main')
			<div class="double-gap"></div>
			@include('admin.invoice.factor.body.print')
		</div>
	</div>
	<div class="double-gap"></div>
@endsection