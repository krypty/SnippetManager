@extends('essais.tplEssai')

@section('titre')
Page de titre de ouf !
@stop

@section('users')
@foreach ($users as $user)
<tr>
    <td>{{$user["user_name"]}}</td>
    <td>{{$user["user_mail"]}}</td>
</tr>
@endforeach       
@stop