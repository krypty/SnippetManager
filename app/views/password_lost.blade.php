@extends('templates.main')

@section('title')
Mot de passe oublié
@stop

@section('content')
<h2>Mot de passe oublié</h2>

{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'AuthentificationController@passwordLostPost'))}}
<div class="form-group">
    {{Form::label("inputEmail", "Adresse mail", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::email("inputEmail", "", array("class" => "form-control", "placeholder" => "exemple@domaine.com", "required" => "required"))}}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        {{Form::submit("Soumettre", array("class" => "btn btn-success"))}}
    </div>
</div>
{{Form::close()}}

@stop