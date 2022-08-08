@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('Compare',$product) }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell">
				<compare :product="{{$product}}" :relate="{{$relate}}" />
			</div>
		</div>
	</div>


@endsection