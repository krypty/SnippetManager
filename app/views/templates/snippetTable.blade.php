<div class="table-content">
    <h3 class="table-title">{{$tableTitle or 'Liste de snippets'}}</h3>
    <table class="table sortable">
        <thead>
            <tr>
                @foreach ($cols as $col)
                <th>{{$col}}</th>
                @endforeach
                </tr>
        </thead>
        <tbody>
            @foreach ($snippetsData as $snippetData)
            <tr>
                 @foreach($snippetData as $value)
                 <td>{{$value}}</td>
                 @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>