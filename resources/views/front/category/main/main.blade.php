@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('category',$data['category']) }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			@if($data['sub_cats']->isEmpty())
				<div class="cell">
					@include('front.category.main.body.main')
				</div>
			@else
				<div class="cell medium-3">
					@include('front.category.main.side.main')
				</div>
				<div class="cell medium-9">
					@include('front.category.main.body.main')
				</div>
			@endif
		</div>
	</div>
@endsection