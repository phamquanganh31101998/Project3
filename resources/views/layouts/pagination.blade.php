<ul class="pagination pagination-lg">
    <li><a href="{{ $result->url(1) }} " >First page</a></li>
    <li><a href="{{ $result->url($result->lastPage()) }}">Last page</a></li>
    @for($i=1;$i<=$result->lastPage();$i++)
    @if($i==$result->currentPage())
    <li class="active"><a href="{{ $result->url($i) }} " >{{$i}}</a></li>
    @else
    <li><a href="{{ $result->url($i) }} " >{{$i}}</a></li>
    @endif
    @endfor
</ul><!--/.pagination-->	
<!-- <div class="pagination">
	<a href="{{ $result->url(1) }} " >First page</a>
	<a href="{{ $result->url($result->lastPage()) }}">Last page</a>
    @for($i=1;$i<=$result->lastPage();$i++)
    <a href="{{ $result->url($i) }} " >{{$i}}</a> 
    @endfor
</div> -->
