<aside id="sidebar">
    <h3>Langages</h3>
    <ul id="sidebar-languages" class="nav nav-pills nav-stacked">
        @foreach ($languages as $language)
        <li class="dropdown"><a href="{{URL::action('SnippetController@listSnippetByLanguage', array('id' => $language["id"]))}}">{{$language["name"]}}<span class="badge badge-primary pull-right">{{$language["count"]}}</span></a></li>
        @endforeach
    </ul>
</aside>