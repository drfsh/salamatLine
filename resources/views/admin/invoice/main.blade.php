@extends('layouts.admin')

@section('NavItems')
	@include('admin.invoice.NavItems')
@endsection

@section('content')
	<div class="double-gap"></div>
	<div class="grid-x grid-padding-x">
		<div class="cell">
			<div class="main-invoice-table">
				<invoice />
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection