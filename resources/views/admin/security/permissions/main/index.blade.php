@extends('layouts.admin')
@section('NavItems')
	@include('admin.security.users.NavItems')
@endsection


@section('content')
	<div class="grid-x grid-padding-x">
		<div class="cell medium-10 medium-offset-1">
			<div class="box rounded">
				@include('admin.security.permissions.main.table')
			</div>
		</div>
	</div>
@endsection