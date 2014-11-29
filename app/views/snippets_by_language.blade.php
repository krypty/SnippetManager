@extends('templates.main')

@section('title')
Liste des snippets en {{$language_name}}
@stop

@section('content')
<h2>Liste des snippets en {{$language_name}}</h2>
@include('templates.snippetTable', $snippetsByLanguageTable)
@stop