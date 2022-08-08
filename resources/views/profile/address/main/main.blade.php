@extends('layouts.profile')

@section('BreadCrumb')
	{{ Breadcrumbs::render('Address') }}
@endsection

@section('content')
	<address-list />
@endsection