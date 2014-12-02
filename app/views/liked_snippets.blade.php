@extends('templates.main')

@section('title')
Les snippets que j'aime
@stop

@section('content')
<h2>Les snippets que j'aime</h2>
    @include('templates.snippetTable', $likedSnippetsTable)
@stop