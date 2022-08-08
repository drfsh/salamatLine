@extends('layouts.admin')
@section('NavItems')
	@include('admin.report.NavItems')
@endsection
@section('content')

<div class="double-gap"></div>

	<div class="grid-x grid-padding-x">
		<div class="cell">
			@include('admin.report.detail.title')
		</div>
		<div class="cell">
			@include('admin.report.detail.cards')
		</div>
		<div class="cell">	
			<div class="gap"></div>
			{{ $data['detail']->links() }}
			<div class="gbox g">
					@include('admin.report.detail.table')
				<div class="footer text-center"><small>لیست به ترتیب تاریخ سفارش می‌باشد</small></div>
			</div>
			{{ $data['detail']->links() }}
		</div>
	</div>
	<div class="double-gap"></div>



@endsection