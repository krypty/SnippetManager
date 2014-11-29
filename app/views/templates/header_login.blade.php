{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'AuthentificationController@loginPost'))}}

<div class="form-group">
    {{Form::label('inputPseudoHeader', 'Pseudo', array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::text("inputPseudo", null, array("class" => "form-control", "placeholder" => "Pseudo","id" => "inputPseudoHeader", "required" => "required"))}}
    </div>

</div>
<div class="form-group">
    {{Form::label('inputPasswordHeader', 'Mot de passe', array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        {{Form::password("inputPassword", array("class" => "form-control", "placeholder" => "Mot de passe", "id" => "inputPasswordHeader", "required" => "required"))}}
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        <div class="col-md-6 col-xs-6 text-left">
            <div class="checkbox">
                {{Form::checkbox('cbxRemember', 1, null, array('id' => 'cbxRemember'))}} {{Form::label('cbxRemember', 'Se souvenir de moi', array('for' => 'cbxRemember'))}}
            </div>
        </div>
        <div class="col-md-6 col-xs-6 text-right">
            {{Form::submit("Se connecter", array("class" => "btn btn-success"))}}
        </div>
    </div>
</div>

<div class="form-group">
    <div class="col-md-offset-2 col-md-10">
        {{HTML::link("createaccount", "S'inscrire")}}
        {{HTML::link("passwordlost", "Mot de passe oublié")}}
    </div>
</div>
{{Form::close()}}