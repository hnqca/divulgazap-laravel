@if ($paginator->hasPages())
<nav class="pagination-container">

    @if ($paginator->onFirstPage())
        <span class="pagination-item disabled"><i class="fas fa-chevron-left"></i></span>
    @else
        <a href="{{ $paginator->appends(request()->query())->previousPageUrl() }}" class="pagination-item"><i class="fas fa-chevron-left"></i></a>
    @endif

    @foreach ($elements as $element)
        @if (is_string($element))
            <span class="pagination-item disabled">{{ $element }}</span>
        @endif

        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="pagination-item active">{{ $page }}</span>
                @else
                    <a href="{{ request()->fullUrlWithQuery(['page' => $page]) }}" class="pagination-item">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->appends(request()->query())->nextPageUrl() }}" class="pagination-item"><i class="fas fa-chevron-right"></i></a>
    @else
        <span class="pagination-item disabled"><i class="fas fa-chevron-right"></i></span>
    @endif
</nav>
@endif