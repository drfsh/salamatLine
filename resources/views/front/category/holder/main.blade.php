@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('CategoryHolder') }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">

			@foreach($topbar as $item)
			<div class="cell">

				<div class="gbox g">
					<div class="head"><a href="{{ route('category', $item->slug) }}">{{$item->name}}</a></div>
					@if(!$item->children->isEmpty())
					<div class="body">
						<div class="grid-x grid-padding-x medium-up-3 large-up-4">
							@foreach($item->children as $item2)
								<div class="cell">
									<a class="button expanded mb2 hollow" href="{{ route('category', $item2->slug) }}">{{$item2->name}}</a>
								</div>
							@endforeach
						</div>

					</div>
					@endif
				</div>


			</div>
			@endforeach
		</div>
	</div>
@endsection