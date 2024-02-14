<div class="pagination-wrap text-center">
    <nav>
        <ul class="pagination">
            {{-- Предыдущая страница --}}
            @if ($paginator->onFirstPage())
                <li class="page-item"><a href=""><i class="fas fa-angle-double-left"></i></a></li>
            @else
                <li class="page-item">
                    <a class="page-item" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Previous"><i class="fas fa-angle-double-left"></i></a>
                </li>
            @endif

            {{-- Номера страниц --}}
            @foreach ($elements as $element)


                {{-- Страницы, которые можно кликнуть --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><a href="">01</a></li>
                        @else
                            <li class="page-item"><a class="page-item" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Следующая страница --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-item" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Next"><i class="fas fa-angle-double-right"></i></a>
                </li>
            @else

                <li class="page-item"><a href=""><i class="fas fa-angle-double-right"></i></a></li>

            @endif
        </ul>
    </nav>
</div>
