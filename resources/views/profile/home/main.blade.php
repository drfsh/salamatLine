@extends('layouts.profile')


@section('BreadCrumb')
	{{ Breadcrumbs::render('Profile') }}
@endsection

@section('content')
	@if($errors->any())
		<div class="callout success">
			{{$errors->first()}}
		</div>
	@endif
	@include('profile.home.detail')
@endsection