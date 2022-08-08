@extends('layouts.front')

@section('content')
    {{ Breadcrumbs::render('indexpage') }}

	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
            @foreach ($pages as $item)
                <div class="cell medium-2">@include('front.page.index.item')</div>
            @endforeach
		</div>
	</div>
	<div class="double-gap"></div>

@endsection
    