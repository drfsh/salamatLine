@extends('layouts.admin')

@section('NavItems')
	@include('admin.invoice.NavItems')
@endsection

@section('content')
	<div class="double-gap"></div>
	<div class="grid-x grid-padding-x">
		<div class="cell">
			<div class="box shadow rounded hover">
				<div class="heading">
					<div class="grid-x">
						<div class="cell medium-6"><h4>فاکتورهای من</h4></div>
						<div class="cell medium-6 date">    
							<div class="float-left">
								<a class="button success tiny" href="{{ route('PreInvoice') }}">ایجاد پیش‌فاکتور</a>
							</div> 
						</div>
					</div>
				</div>
			</div>
			<div class="main-invoice-table">
				<invoice :creator="{{Auth::user()->id}}"/>
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection