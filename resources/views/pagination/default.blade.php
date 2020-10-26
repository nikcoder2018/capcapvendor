@if ($paginator->lastPage() > 1)
<ul class="pagination justify-content-center">
    <li class="page-item prev {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a class="page-link brd-rd2" href="{{ $paginator->url(1) }}">PREVIOUS</a>
    </li>
    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        <li class="page-item {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a class="page-link brd-rd2" href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <li class="page-item next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a class="page-link brd-rd2" href="{{ $paginator->url($paginator->currentPage()+1) }}" >NEXT</a>
    </li>
</ul>
@endif
