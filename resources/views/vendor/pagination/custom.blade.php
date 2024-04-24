<div class="mt-8">
    <div class="flex">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a href="#" class="mx-1 px-3 py-2 bg-gray-200 text-gray-500 font-medium rounded-md cursor-not-allowed">
                Previous
            </a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 font-medium hover:bg-blue-500 hover:text-gray-200 rounded-md">
                Previous
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <a href="{{ $url }}" class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 font-medium hover:bg-blue-500 hover:text-gray-200 rounded-md {{ ($page == $paginator->currentPage()) ? 'bg-blue-500 text-gray-200' : '' }}">
                        {{ $page }}
                    </a>
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="mx-1 px-3 py-2 bg-gray-200 text-gray-700 font-medium hover:bg-blue-500 hover:text-gray-200 rounded-md">
                Next
            </a>
        @else
            <a href="#" class="mx-1 px-3 py-2 bg-gray-200 text-gray-500 font-medium rounded-md cursor-not-allowed">
                Next
            </a>
        @endif
    </div>
</div>
