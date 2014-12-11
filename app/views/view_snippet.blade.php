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
            @if(Auth::check())
            @if($isSnippetAlreadyLiked)
            <a href="{{URL::action('SnippetController@unlikeSnippet', $snippetData["id"])}}"><button type="submit" class="btn btn-default">Je n'aime plus</button></a>
            @else
            <a href="{{URL::action('SnippetController@likeSnippet', $snippetData["id"])}}"><button type="submit" class="btn btn-default">J'aime</button></a>
            @endif
            @if(Auth::check() && $snippetData["author_id"] == Auth::user()->id)
            <a href="{{URL::action('SnippetController@editSnippetShow', $snippetData["id"])}}"><button type="submit" class="btn btn-default">Modifier</button></a>
            <a href="{{URL::action('SnippetController@deleteSnippet', $snippetData["id"])}}"><button type="submit" class="btn btn-default">Supprimer</button></a>
            @endif
            @endif

        </div>
    </div>
    <div class="col-md-4">
        <div class="col-md-12">
            <fieldset><legend>Détails</legend>
                <p><span class="snippet-details-labels">Auteur</span>{{$snippetData["author"]}}</p>
                <p><span class="snippet-details-labels">Titre</span>{{$snippetData["title"]}}</p>
                <p><span class="snippet-details-labels">Langage</span>{{$snippetData["language"]}}</p>
                <p><span class="snippet-details-labels">Créé le</span>{{$snippetData["createdAt"]}}</p>
                <p><span class="snippet-details-labels">Modifié le</span>{{$snippetData["updatedAt"]}}</p>
                <p><span class="snippet-details-labels">Visibilité</span>{{$snippetData["visibility"]}}</p>
            </fieldset>
        </div>
    </div>
</div>

@stop