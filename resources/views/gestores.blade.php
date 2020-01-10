
@extends('layout')

@section('content')
    


<div class="py-4" style="margin-right: 5%; margin-left: 5%;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Muelles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Horarios</a>
        </li>
    </ul>
</div>


@endsection

@section('sidebar')
    @parent
    <h2>Mi barra personalizada</h2>
@endsection

