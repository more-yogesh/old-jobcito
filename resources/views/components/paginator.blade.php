<div class="pagination-container margin-top-20 margin-bottom-20">
    @if ($paginator->lastPage() > 1)
        <nav class="pagination">
            <ul>
                <li class="pagination-arrow">
                    <a href="{{ $paginator->url(1) }}" class="ripple-effect {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
                        <i class="icon-material-outline-keyboard-arrow-left"></i>
                    </a>
                </li>
                @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                    <li>
                        <a href="{{ $paginator->url($i) }}"
                           class="{{ ($paginator->currentPage() == $i) ? ' current-page' : ' ripple-effect' }}">{{ $i }}</a>
                    </li>
                @endfor
                <li class="pagination-arrow">
                    <a href="{{ $paginator->url($paginator->currentPage()+1) }}"
                       class="ripple-effect {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
                        <i class="icon-material-outline-keyboard-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </nav>
    @endif
</div>
