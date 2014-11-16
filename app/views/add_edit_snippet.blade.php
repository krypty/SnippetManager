@extends('templates.main')

@section('title')
{{$title}}
@stop

@section('content')
<h2>{{$title}}</h2>

<form class="form-horizontal" role="form">
    <div class="form-group">
        <label for="inputTitle" class="col-md-2 control-label">Titre</label>
        <div class="col-md-10">
            <input type="text" class="form-control" id="inputTitle" placeholder="Titre du snippet" {{isset($snippetData['title']) ? 'value="'.$snippetData["title"].'"': ''}}>
        </div>
    </div>
    <div class="form-group">
        <label class="col-md-2 control-label">Langage</label>
        <div class="col-md-10">
            <select name="inputLanguage" class="form-control">
                @foreach ($languagesSelect as $key=>$value)
                <option @if(isset($snippetData) && $snippetData['language']==$value) selected="selected" @endif value="{{$key}}">{{$value}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPublic" class="col-md-2 control-label">Snippet public</label>
        <div class="col-md-10">
            <div class="checkbox">
                <input type="checkbox" id="inputPublic" @if(isset($snippetData) && $snippetData['public'] == 1) checked="checked" @endif>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="inputCode" class="col-md-2 control-label">Code</label>
        <div class="col-md-10">
            <textarea class="form-control" rows="10" id="inputCode">{{$snippetData["code"] or ''}}</textarea>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-offset-2 col-smd-10">
            <button type="submit" class="btn btn-danger">Annuler</button>
            <a href="#"><button type="button" class="btn btn-success">Envoyer</button></a>
        </div>
    </div>
</form>

@stop