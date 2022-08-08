@unless ($breadcrumbs->isEmpty())
	<div class="bread-crumb">
		<div class="grid-container">
			<div class="grid-x grid-padding-x">
				<div class="cell">
					<nav aria-label="You are here:" role="navigation">
						<ul class="breadcrumbs">
							@foreach ($breadcrumbs as $breadcrumb)
							 @if (!is_null($breadcrumb->url) && !$loop->last)
								<li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
							 @else
								<li>{{ $breadcrumb->title }}</li>
							@endif
							 @endforeach
						</ul>
					</nav>
				</div>
			</div>	
		</div>
	</div>
@endunless

