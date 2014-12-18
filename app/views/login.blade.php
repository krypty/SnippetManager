@extends('templates.main')

@section('title')
Login
@stop

@section('content')
<h2>Se connecter</h2>

{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'AuthentificationController@loginPost'))}}

<div class="form-group">
    {{Form::label("inputPseudo", "Pseudo", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::text("inputPseudo", null, array("class" => "form-control", "required" => "required"))}}
    </div>
</div>
<div class="form-group">
    {{Form::label("inputPassword", "Mot de passe", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputPassword", array("class" => "form-control", "required" => "required"))}}
    </div>
</div> 
<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <div class="checkbox">
            {{Form::checkbox('cbxRemember', 1, null, array('id' => 'cbxRemember'))}} {{Form::label('cbxRemember', 'Se souvenir de moi', array('for' => 'cbxRemember'))}}
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        {{Form::submit("Se connecter", array("class" => "btn btn-success"))}}
    </div>
</div>
{{Form::close()}}
@stop