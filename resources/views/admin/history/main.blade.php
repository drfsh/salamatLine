@extends('layouts.admin')

@section('NavItems')

@endsection

@section('content')
	<div class="double-gap"></div>
	<div class="grid-x grid-padding-x">
		<div class="cell medium-10 medium-offset-1">
			<div class="box rounded">
				@include('admin.history.table')
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection