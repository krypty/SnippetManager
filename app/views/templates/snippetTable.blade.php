<div class="table-content">
    <h3 class="table-title">{{$tableTitle or 'Liste de snippets'}}</h3>
    <table class="table sortable">
        <thead>
            <tr>
                @foreach ($cols as $col)
                @if ($col != "id")
                    <th>{{$col}}</th>
                @endif
                @endforeach
                </tr>
        </thead>
        <tbody>
            @foreach ($snippetsData as $snippetData)
            <tr>
                
                 @foreach(array_keys($cols) as $col)
                    <?php $value = $snippetData[$col]; ?>
                    @if($col == "title")
                       <td><a href="{{URL::action('SnippetController@ViewSnippetShow', $snippetData['id'])}}">{{$value}}</a></td>
                    @elseif($col == "id")
                    @elseif(is_numeric($value))
                        <td class="text-right">{{$value}}</td>
                    @else
                       <td>{{$value}}</td>
                    @endif
                 @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>