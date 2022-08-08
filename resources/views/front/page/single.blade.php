@extends('layouts.front')

@section('content')
    {{ Breadcrumbs::render('singlepage', $page) }}
    @include('front.page.single.header')
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
            @include('front.page.single.main')
		</div>
	</div>
	<div class="double-gap"></div>

@endsection