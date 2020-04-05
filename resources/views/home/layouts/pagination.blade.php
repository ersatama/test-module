<nav class="mt-5">
    <ul class="pagination">
        @for($i=0;$i<$max;$i++)
            <li class="page-item {{($i+1)==$page?'active':''}}">
                <a class="page-link" href="/home{{($i+1)!==1?'?page='.($i+1):''}}">{{$i+1}}{!! ($i+1)===$page?'<span class="sr-only">(current)</span>':'' !!}</a>
            </li>
        @endfor
    </ul>
</nav>
