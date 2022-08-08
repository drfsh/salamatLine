@extends('layouts.front')

@section('content')
	{{ Breadcrumbs::render('collection',$data['collection']) }}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="cell">
				{{ $data['products']->links() }}

                <div class="grid-x small-up-2 medium-up-3 large-up-4">
                    @foreach($data['products'] as $item)
                        <div class="cell">@include('front.product.holder.item.main')</div>
                    @endforeach
                </div>
				<div class="double-gap"></div>
				{{ $data['products']->links() }}
			</div>
			<div class="cell">
				@include('front.collection.main.other')
			</div>
		</div>
	</div>
	<div class="double-gap"></div>
@endsection