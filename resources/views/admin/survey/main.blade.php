@extends('layouts.admin')

@section('content')
	<div class="double-gap"></div>
		@include('admin.survey.card')
	<div class="double-gap"></div>
	<div class="grid-x grid-padding-x">
	    @include('admin.survey.table')
	</div>
	

	<div class="double-gap"></div>
@endsection