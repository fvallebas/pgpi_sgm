
@extends('layout')

@section('content')
    <h1>{{ $title }}</h1>
    @forelse($users as $user)
        <li>{{ $user }}</li>
    @empty
        <p>No hay usuarios disponibles  </p>
    @endforelse


    <div class="py-4" style="margin-right: 5%; margin-left: 5%;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active">Mis Reservas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Otra Funcionalidad</a>
        </li>
    </ul>
</div>


@endsection

@section('sidebar')
    @parent
    <h2>Mi barra personalizada</h2>
@endsection

