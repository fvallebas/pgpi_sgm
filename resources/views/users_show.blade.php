@extends('layout')

@section('content')
    <h1>{{$id}}#</h1>
    <p>La id de mi usuario es la siguiente: {{$id}}</p>
@endsection

@section('sidebar')

    @parent
    <h2>Mi barra personalizada</h2>
@endsection