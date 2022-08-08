@extends('layouts.admin')

@section('NavItems')
	@include('admin.security.users.NavItems')
@endsection


@section('content')
	<div class="grid-x grid-padding-x">
		<div class="cell medium-10 medium-offset-1">
			<div class="box rounded">
				@include('admin.security.roles.main.table')
			</div>
		</div>
	</div>
@endsection