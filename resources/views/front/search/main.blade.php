@extends('layouts.front')
@section('content')
{{-- {{ Breadcrumbs::render('Search') }} --}}
	<div class="double-gap"></div>
	<div class="grid-container">
		<div class="grid-x">
			<div class="cell text-center">
	    		<b>{{ $searchResults->count() }}</b> نتیجه برای جستجوی <u>{{ request('query') }}</u> یافت شد.
	    		<div class="gap"></div>
			</div>

			@foreach($searchResults->groupByType() as $type => $modelSearchResults)

				@if(ucfirst($type) == 'Products')
					@include('front.search.item.product')
				@endif

				@if(ucfirst($type) == 'Brands')
					@include('front.search.item.brand')
				@endif

				@if(ucfirst($type) == 'Companies')
					@include('front.search.item.company')
				@endif

				@if(ucfirst($type) == 'Countries')
					@include('front.search.item.country')
				@endif

			@endforeach

		</div>
	</div>
	<div class="double-gap"></div>
@endsection