@extends('templates.main')

@section('title')
{{$snippetData["title"]}}
@stop

@section('content')
<h2>{{$snippetData["title"]}}</h2>

<div class="col-md-12">
    <div class="col-md-8">
        <div class="col-md-12">
            <fieldset><legend>Code du snippet</legend>
                <textarea rows="25">{{$snippetData["code"] or 'Mettre code ici...'}}</textarea>
            </fieldset>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-default">Tout sélectionner</button>
            <a href="{{URL::to('#')}}"><button type="submit" class="btn btn-default">J'aime</button></a>
            <a href="{{URL::to('#')}}"><button type="submit" class="btn btn-default">Modifier</button></a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="col-md-12">
            <fieldset><legend>Détails</legend>
                <p><span class="snippet-details-labels">Auteur</span>{{$snippetData["author"]}}</p>
                <p><span class="snippet-details-labels">Crée le</span>{{$snippetData["createdAt"]}}</p>
                <p><span class="snippet-details-labels">Modifié le</span>{{$snippetData["updatedAt"]}}</p>
                <p><span class="snippet-details-labels">Visibilité</span>{{$snippetData["visibility"]}}</p>
            </fieldset>
        </div>
    </div>
</div>

@stop