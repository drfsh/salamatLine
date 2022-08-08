@extends('layouts.front')
@section('content')
	{{ Breadcrumbs::render('ProductHolder') }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				<div class="center-title"><h1 class="heading">محصولات بر اساس شرکت تولیدکننده یا وارد کننده</h1></div>
				{{ $data['company']->links() }}
				<div class="gap"></div>
			</div>
			@foreach($data['company'] as $item)
				<div class="cell small-6 medium-4 large-3">
					<a href="{{ route('company',$item->slug) }}" class="button expanded hollow">{{$item->title}}</a>
					<div class="double-gap"></div>
				</div>
			@endforeach
			<div class="cell">
				{{ $data['company']->links() }}
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection