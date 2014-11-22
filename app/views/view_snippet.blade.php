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
                @include('templates.codemirror-textarea', array("code" => $snippetData["code"], "mode" => $snippetData["syntaxColorCode"], "readonly" => true))
            </fieldset>
        </div>
        <div class="col-md-12">
            <a href="{{URL::action('SnippetController@likeSnippet', $snippetData["id"])}}"><button type="submit" class="btn btn-default">J'aime</button></a>
            <a href="{{URL::action('SnippetController@editSnippetShow', $snippetData["id"])}}"><button type="submit" class="btn btn-default">Modifier</button></a>
        </div>
    </div>
    <div class="col-md-4">
        <div class="col-md-12">
            <fieldset><legend>Détails</legend>
                <p><span class="snippet-details-labels">Auteur</span>{{$snippetData["author"]}}</p>
                <p><span class="snippet-details-labels">Créé le</span>{{$snippetData["createdAt"]}}</p>
                <p><span class="snippet-details-labels">Modifié le</span>{{$snippetData["updatedAt"]}}</p>
                <p><span class="snippet-details-labels">Visibilité</span>{{$snippetData["visibility"]}}</p>
            </fieldset>
        </div>
    </div>
</div>

@stop