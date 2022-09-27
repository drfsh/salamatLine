@extends('layouts.front')
@section('content')

	<div class="grid-container">
		<div class="double-gap"></div>
		{{ Breadcrumbs::render('Compare',$product) }}
		<div class="grid-x">
			<div class="cell">
				<compare :product="{{$product}}" :relate="{{$relate}}" />
			</div>
		</div>
	</div>


@endsection