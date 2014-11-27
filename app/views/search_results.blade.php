@extends('templates.main')

@section('title')
Mes snippets
@stop

@section('content')
<h2>Résultat de la recherche pour: {{$query}}</h2>
    @include('templates.snippetTable', $searchResultsSnippetsTable)
@stop