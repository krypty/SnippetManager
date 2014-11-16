@extends('templates.main')

@section('title')
Mot de passe oublié
@stop

@section('content')
<h2>Mot de passe oublié</h2>

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Adresse mail</label>
        <div class="col-md-10">
            <input type="email" class="form-control" id="inputEmail" placeholder="exemple@domaine.com">
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-smd-10">
            <button type="submit" class="btn btn-success">Soumettre</button>
        </div>
    </div>
</form>

@stop