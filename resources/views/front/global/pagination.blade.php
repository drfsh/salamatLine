@if ($paginator->hasPages())
    <div aria-label="Pagination">
        <ul class="pagination text-center">
            @if (!$paginator->onFirstPage())
            <li class="pagination-previous">
                <a href="{{ $paginator->previousPageUrl() }}" aria-label="{{ __('pagination.previous') }}">{{ __('pagination.previous') }}</a>
            </li>
            @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="ellipsis"></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="current">{{ $page }}</li>
                    @else
                        <li>
                            <a href="{{ $url }}" aria-label="{{ __('pagination.page') }} {{ $page }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
            @if ($paginator->hasMorePages())
                <li class="pagination-next">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-label="{{ __('pagination.next') }}">{{ __('pagination.next') }}</a>
                </li>
            @endif
        </ul>
    </div>
@endif