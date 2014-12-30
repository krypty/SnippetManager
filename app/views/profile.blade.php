@extends('templates.main')

@section('title')
Votre profil
@stop

@section('content')
<h2>Profil de {{$profile["pseudo"] or '???'}}</h2>

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

{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'ProfileController@edit'))}}
<div class="form-group">
    {{Form::label("inputEmail", "Adresse mail", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::text("inputEmail", $profile['mail'], array("class" => "form-control", "readonly" => "readonly" ))}}
    </div>
</div>

<div class="form-group">
    {{Form::label("inputOldPassword", "Ancien mot de passe", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputOldPassword", array("class" => "form-control", "required" => "required"))}}
    </div>
</div>

<div class="form-group">
    {{Form::label("inputNewPassword", "Nouveau mot de passe", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputNewPassword", array("class" => "form-control", "required" => "required"))}}
    </div>
</div>


<div class="form-group">
    {{Form::label("inputNewPasswordConfirm", "Nouveau mot de passe (confirmation)", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputNewPasswordConfirm", array("class" => "form-control", "required" => "required"))}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        {{Form::submit("Modifier le profil", array("class" => "btn btn-success"))}}
    </div>
</div>
{{Form::close()}}
@stop