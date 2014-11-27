@extends('templates.main')

@section('title')
{{$title}}
@stop

@section('content')
<h2>{{$title}}</h2>

@if(isset($snippetData))
{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'SnippetController@editSnippetPost'))}}
@else
{{Form::open(array('class' => 'form-horizontal', 'role' => 'form', 'action' => 'SnippetController@addSnippetPost'))}}
@endif
<div class="form-group">
    {{Form::label("inputTitle", "Titre", array("class" => "col-md-2 control-label"))}}
    <div class="col-md-10">
        <?php $title = isset($snippetData['title']) ? $snippetData["title"] : '' ?>
        {{Form::text("inputTitle", $title, array("class" => "form-control", "placeholder" => "Titre du snippet" ))}}
    </div>
</div>
<div class="form-group">
    <label class="col-md-2 control-label">Langage</label>
    <div class="col-md-10">

        <?php $defaultLanguage = isset($snippetData) ? array_search($snippetData['language'], $languagesSelect) : ""; ?>
        {{Form::select("inputLanguage", $languagesSelect, $defaultLanguage, array("class" => "form-control"))}}
    </div>
</div>
<div class="form-group">
    <label for="inputPublic" class="col-md-2 control-label">Snippet public</label>
    <div class="col-md-10">
        <div class="checkbox">
            <?php $isPublic = isset($snippetData) && $snippetData['public'] == 1 ?>
            {{Form::checkbox("inputPublic", "", $isPublic)}}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="inputCode" class="col-md-2 control-label">Code</label>
    <div class="col-md-10">
        <?php
        $code = "";
        $mode = "";
        if (isset($snippetData)) {
            $code = $snippetData["code"];
            $mode = $snippetData["syntaxColorCode"];
        }
        ?>
        @include('templates.codemirror-textarea', array("code" => $code, "mode" => $mode, "readonly" => false))
    </div>
</div>
<div class="form-group">
    <div class="col-md-offset-2 col-smd-10">
        {{HTML::link(URL::previous(), 'Annuler', array('class' => 'btn btn-danger'))}}
        {{Form::submit("Envoyer", array("class" => "btn btn-success"))}}
    </div>
</div>

@if(isset($snippetData))
{{Form::hidden("snippet_id", $snippetData['id'])}}
@endif

{{Form::close()}}

@stop