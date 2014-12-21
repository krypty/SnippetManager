@extends('templates.main')

@section('title')
Création de compte
@stop

@section('content')
<h2>Réinitialisation du mot de passe</h2>

@if(Session::has("error"))
<div class="alert alert-danger">
    <strong>Erreur: </strong>{{Session::get("error")}}
</div>
@endif


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

{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'route' => array('password.update', $token)))}}
<div class="form-group">
    {{Form::label("email", "Adresse mail", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::email("email", null, array("class" => "form-control", "required" => "required", "placeholder" => "exemple@domaine.com"))}}
    </div>
</div>
<div class="form-group">
    {{Form::label("password", "Mot de passe", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("password", array("class" => "form-control", "required" => "required"))}}
    </div>
</div> 
<div class="form-group">
    {{Form::label("password_confirmation", "Mot de passe (confirmation)", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("password_confirmation", array("class" => "form-control", "required" => "required"))}}
    </div>
</div> 

<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        <button type="submit" class="btn btn-success">Réinitialiser le mot de passe</button>
    </div>
</div>

{{ Form::hidden('token', $token) }}
{{Form::close()}}
@stop