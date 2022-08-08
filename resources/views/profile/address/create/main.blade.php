@extends('layouts.profile')

@section('BreadCrumb')
	{{ Breadcrumbs::render('Profile') }}
@endsection

@section('content')
    <div class="double-gap"></div>
    <create-address />
@endsection