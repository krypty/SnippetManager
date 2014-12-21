@extends('templates.main')

@section('title')
Mot de passe oublié
@stop

@section('content')
<h2>Mot de passe oublié</h2>

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


{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'PasswordController@request'))}}
<div class="form-group">
    {{Form::label("inputEmail", "Adresse mail", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::email("email", "", array("class" => "form-control", "placeholder" => "exemple@domaine.com", "required" => "required"))}}
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        {{Form::submit("Soumettre", array("class" => "btn btn-success"))}}
    </div>
</div>
{{Form::close()}}

@stop