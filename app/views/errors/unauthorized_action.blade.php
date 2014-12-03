@extends('templates.main')

@section('title')
Erreur
@stop

@section('content')
<h2>Action impossible</h2>
<div class="alert alert-danger">
    <p>{{$errorMessage}}</p>
</div>
@stop