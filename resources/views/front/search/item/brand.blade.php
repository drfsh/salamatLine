<div class="cell">
	<div class="p-title">
		<h5><a href="{{ route('brandHolder') }}">برندها</a></h5>
		<hr>
	</div>
	<div class="grid-x grid-padding-x small-up-2 medium-up-4 large-up-6">
		@foreach($modelSearchResults as $searchResult)
				<div class="cell">
					<a class="button expanded hollow" href="{{ $searchResult->url }}">
						{{ $searchResult->title }}
					</a>
					<div class="gap"></div>
				</div>
		@endforeach
	</div>
	<div class="gap"></div>
</div>