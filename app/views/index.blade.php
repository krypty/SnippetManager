@extends('templates.main')

@section('title')
Accueil
@stop

@section('content')
<h2>Accueil</h2>
    @include('templates.snippetTable', $newestSnippetTable)
    @include('templates.snippetTable', $topSnippetTable)
@stop