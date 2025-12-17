<div class="pagination-list-new" style="display: none">
    <div class="pg-technology-item active-item">
        <div class="text-svg">1</div>
        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg"
             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
             viewBox="0 0 58 42.333" style="cursor: pointer;" xml:space="preserve"> <style
                type="text/css">.st0 {
                    fill: none;
                    stroke: #789A3D;
                    stroke-width: 2;
                }</style>
            <path class="st0"
                  d="M53.637,38.716v-2.52c0-16.967-13.838-30.72-30.907-30.72h-2.535H6.008H3.475v2.519 c0,16.967,13.837,30.721,30.905,30.721h2.535h14.187H53.637z"
                  style="cursor: pointer;"></path></svg>
    </div>
</div>
@if ($paginator->lastPage() > 1)
    <div class="pagination-list-new">

        {{-- PREV --}}
        @if (!$paginator->onFirstPage())
            <div class="pg-technology-item icon-pagination prev-pagination">
                <a href="{{ $paginator->previousPageUrl() }}">
                    <img src="/img-fix/prev-arrow-slider.png" alt="">
                </a>
            </div>
        @endif

        {{-- PAGE NUMBERS --}}
        @foreach ($elements as $element)

            {{-- "..." --}}
            @if (is_string($element))
                <div class="pg-technology-item disabled">
                    <span>{{ $element }}</span>
                </div>
            @endif

            {{-- PAGE LINKS --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    <div class="pg-technology-item {{ $page == $paginator->currentPage() ? 'active-item' : '' }}">
                        @if ($page == $paginator->currentPage())
                            <div class="text-svg">{{ $page }}</div>
                        @else
                            <a href="{{ $url }}">
                                <div class="text-svg">{{ $page }}</div>
                            </a>
                        @endif

                        {{-- SVG giữ nguyên --}}
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                             viewBox="0 0 58 42.333">
                            <path class="st0"
                                  d="M53.637,38.716v-2.52c0-16.967-13.838-30.72-30.907-30.72h-2.535H6.008H3.475v2.519
                              c0,16.967,13.837,30.721,30.905,30.721h2.535h14.187H53.637z"></path>
                        </svg>
                    </div>
                @endforeach
            @endif

        @endforeach

        {{-- NEXT --}}
        @if ($paginator->hasMorePages())
            <div class="pg-technology-item icon-pagination next-pagination">
                <a href="{{ $paginator->nextPageUrl() }}">
                    <img src="/img-fix/next-arrow-slider.png" alt="">
                </a>
            </div>
        @endif

    </div>
@endif
