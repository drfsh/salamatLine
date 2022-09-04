@unless ($breadcrumbs->isEmpty())
    <div class="router box2">
        @include('icons.home')
        <ul class="breadcrumbs">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
                @else
                    <li>{{ $breadcrumb->title }}</li>
                @endif
            @endforeach
        </ul>
    </div>
@endunless

