@extends('templates.main')

@section('title')
Création de compte
@stop

@section('content')
<h2>Nouveau compte</h2>

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputPseudo" class="col-md-2 control-label">Pseudo</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="inputPseudo" required="required">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Adresse mail</label>
        <div class="col-md-10">
            <input type="email" class="form-control" id="inputEmail" placeholder="exemple@domaine.com" required="required">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword" class="col-md-2 control-label">Mot de passe</label>
        <div class="col-md-10">
            <input type="password" class="form-control" id="inputPassword" required="required">
        </div>
    </div> 
    <div class="form-group">
        <label for="inputPasswordConfirm" class="col-md-2 control-label">Mot de passe (confirmation)</label>
        <div class="col-md-10">
            <input type="password" class="form-control" id="inputPasswordConfirm" required="required">
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-offset-2 col-smd-10">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-success">Créer un compte</button>
        </div>
    </div>
</form>
@stop