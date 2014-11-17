@extends('templates.main')

@section('title')
Votre profil
@stop

@section('content')
<h2>Profil de {{$profile["pseudo"] or '???'}}</h2>

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputEmail" class="col-md-2 control-label">Adresse mail</label>
        <div class="col-md-10">
            <input type="email" class="form-control" id="inputEmail" readonly="readonly" value="{{$profile['mail'] or 'mail not found !'}}">
        </div>
    </div>
    <div class="form-group">
        <label for="inputOldPassword" class="col-md-2 control-label">Ancien mot de passe</label>
        <div class="col-md-10">
            <input type="password" class="form-control" id="inputOldPassword">
        </div>
    </div>
    <div class="form-group">
        <label for="inputNewPassword" class="col-md-2 control-label">Nouveau mot de passe</label>
        <div class="col-md-10">
            <input type="password" class="form-control" id="inputNewPassword">
        </div>
    </div> 
    <div class="form-group">
        <label for="inputNewPasswordConfirm" class="col-md-2 control-label">Nouveau mot de passe (confirmation)</label>
        <div class="col-md-10">
            <input type="password" class="form-control" id="inputNewPasswordConfirm">
        </div>
    </div> 

    <div class="form-group">
        <div class="col-md-offset-2 col-smd-10">
            <button type="submit" class="btn btn-success">Modifier profil</button>
        </div>
    </div>
</form>
@stop