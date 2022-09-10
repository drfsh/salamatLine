<form action="{{ route('search') }}" method="get" class="search-menu">
	<input type="text" name="query" placeholder="جستجو در محصولات" />
	<button type="submit" aria-label="Search">
		@include('icons.search')
	</button>
</form>