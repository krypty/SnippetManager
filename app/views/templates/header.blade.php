<header class="col-md-12">
    <div class="col-md-8" id="header-title">
        <h1>{{HTML::link('/', "Snippet Manager - Gérez vos bouts d'code !")}}</h1>
    </div>
    <div class="col-md-4" id="user-panel">
        @if(Auth::check() )
        @include('templates.header_userpanel')
        @else
        @include('templates.header_login')
        @endif
    </div>

</header>