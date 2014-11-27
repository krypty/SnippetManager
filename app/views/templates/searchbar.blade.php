<div id="searchbar" class="col-md-12 col-xs-12">
    <div class="col-md-12 col-xs-12">
        {{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'method' => 'get', 'action' => 'SearchController@showResults'))}}

        <div class="input-group form-search">
            <input name="query" type="text" class="form-control search-query" placeholder="Taper le nom d'un snippet...">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-primary" data-type="last">Rechercher</button>
            </span>
        </div>
        {{Form::close()}}
    </div>
</div>