
@extends('layout')

@section('content')
    <h1>{{ $title }}</h1>
    @forelse($users as $user)
        <li>{{ $user }}</li>
    @empty
        <p>No hay usuarios disponibles </p>
    @endforelse
@endsection

@section('sidebar')
    @parent
    <h2>Mi barra personalizada</h2>
@endsection

