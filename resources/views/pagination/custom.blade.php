@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center border border-gray-300 rounded-lg">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span class="px-4 py-2 bg-gray-200 text-gray-400 cursor-default border-gray-300 rounded-l-lg">&lsaquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="px-4 py-2 bg-white text-gray-600 rounded-l-lg hover:bg-[#F96D0E] hover:text-white transition ease-in-out duration-150 border-gray-300">&lsaquo;</a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="px-4 py-2 bg-white text-gray-400 border-l border-gray-300">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="px-4 py-2 bg-[#F96D0E] text-white font-bold border-l border-gray-300">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="px-4 py-2 bg-white text-gray-600 hover:bg-[#F96D0E] hover:text-white transition ease-in-out duration-150 border-l border-gray-300">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="px-4 py-2 bg-white text-gray-600 rounded-r-lg hover:bg-[#F96D0E] hover:text-white transition ease-in-out duration-150 border-l border-gray-300">&rsaquo;</a>
        @else
            <span class="px-4 py-2 bg-gray-200 text-gray-400 cursor-default border-l border-gray-300 rounded-r-lg">&rsaquo;</span>
        @endif
    </nav>
@endif
