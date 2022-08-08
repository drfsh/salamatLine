@guest
	<menu-cart :auth="false" />
@else
	<menu-cart :auth="true" />
@endguest