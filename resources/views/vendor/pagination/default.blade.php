@if ($paginator->hasPages())
    <ul class="flex list-reset w-auto justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="block hover:text-white hover:bg-blue text-grey border-r border-grey-light px-3 py-2 cursor-not-allowed"><span>&laquo;</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="block hover:text-white hover:bg-blue text-grey border-r border-grey-light px-3 py-2 cursor-not-allowed"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="block text-white bg-blue border-r border-blue px-3 py-2"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="block hover:text-white hover:bg-blue text-blue border-r border-grey-light px-3 py-2">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="block hover:text-white hover:bg-blue text-blue px-3 py-2">&raquo;</a></li>
        @else
            <li class="block hover:text-white hover:bg-blue text-grey border-r border-grey-light px-3 py-2 cursor-not-allowed"><span>&raquo;</span></li>
        @endif
    </ul>
@endif
