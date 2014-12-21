@extends('templates.main')

@section('title')
Création de compte
@stop

@section('content')
<h2>Nouveau compte</h2>

@if ( $errors->count() > 0 )
<div class="alert alert-danger">
    <strong>Les erreurs suivantes ont eu lieu:</strong>

    <ul>
        @foreach( $errors->all() as $message )
        <li>{{ $message }}</li>
        @endforeach
    </ul>
</div>
@endif

{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'AuthentificationController@createAccountPost'))}}
<div class="form-group">
    {{Form::label("inputPseudo", "Pseudo", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::text("inputPseudo", null, array("class" => "form-control", "required" => "required"))}}
    </div>
</div>
<div class="form-group">
    {{Form::label("inputEmail", "Adresse mail", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::email("inputEmail", null, array("class" => "form-control", "required" => "required", "placeholder" => "exemple@domaine.com"))}}
    </div>
</div>
<div class="form-group">
    {{Form::label("inputPassword", "Mot de passe", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputPassword", array("class" => "form-control", "required" => "required"))}}
    </div>
</div> 
<div class="form-group">
    {{Form::label("inputPasswordConfirm", "Mot de passe (confirmation)", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputPasswordConfirm", array("class" => "form-control", "required" => "required"))}}
    </div>
</div> 

<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        <button type="reset" class="btn btn-danger">Reset</button>
        <button type="submit" class="btn btn-success">Créer un compte</button>
    </div>
</div>
{{Form::close()}}
@stop