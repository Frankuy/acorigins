@if (count($data) == 0) 
    <div class="has-text-centered">
        <h1 class="title has-text-warning">No matching record found</h1>
    </div>
@else 
    <table class="table is-fullwidth is-size-7-mobile has-text-white">
        <thead>
            <tr>
                <th class="has-text-white">Name</th>
                <th class="has-text-white">Rarity</th>
                <th class="has-text-white">Category</th>
                <th class="has-text-white">Owned</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr class="{{$item->rarity}}">
                    <td>{{$item->name}}</td>
                    <td>{{$item->rarity}}</td>
                    <td>{{$item->category}}</td>
                    <td>
                        @if ($item->owned)
                            <a class="icon checkicon has-text-success checked" onclick="checkClick({{$item->id}})">
                                <i class="fas fa-check-square"></i>
                            </a>
                        @else
                            <a class="icon checkicon has-text-light uncheck" onclick="checkClick({{$item->id}})">
                                <i class="fas fa-square"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav class="pagination is-centered" role="navigation" aria-label="pagination">
        <a class="pagination-previous button is-warning has-text-weight-bold">&laquo;</a>
        <a class="pagination-next button is-warning has-text-weight-bold">&raquo;</a>
        <input type="hidden" value="{{$pages}}" id="lastpage">
        <ul class="pagination-list">
            @foreach ($formatPages as $p)
                @if ($p == $page)
                    <li><a class="pagination-link button is-warning is-active is-medium has-text-weight-bold">{{$p}}</a></li>
                @elseif ($p == '...')
                    <li><span class="pagination-ellipsis has-text-warning">&hellip;</span></li>
                @else
                    <li><a class="pagination-link button is-warning">{{$p}}</a></li>
                @endif
             @endforeach
        </ul>
    </nav>
    <script type="text/javascript" charset="utf8" src="{{asset('js/ajax.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/pagination.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="{{asset('js/check.js')}}"></script>
@endif