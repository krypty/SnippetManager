<aside id="sidebar">
    <h3>Langages</h3>

    <ul id="sidebar-languages" class="nav nav-pills nav-stacked">
        @foreach ($languages as $key=>$value)
        <li class="dropdown"><a href="#">{{$key}}<span class="badge badge-primary pull-right">{{$value}}</span></a></li>
        @endforeach
    </ul>
</aside>