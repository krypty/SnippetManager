@extends('templates.main')

@section('title')
Mes snippets
@stop

@section('content')
<h2>Mes snippets</h2>
    @include('templates.snippetTable', $mySnippetsTable)
@stop