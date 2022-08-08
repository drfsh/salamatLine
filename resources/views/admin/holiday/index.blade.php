@extends('layouts.admin')
@section('content')
	<div class="double-gap"></div>
        <div class="grid-x grid-padding-x">
            @include('admin.holiday.main.main')
        </div>
        
	<div class="double-gap"></div>
@endsection



@section('js')
	@include('admin.global.js.datepicker')
@endsection