<!-- index.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<br>
<div class="uper" style="margin-right: 5%; margin-left: 5%;">
<div class="py-4" style="margin-right: 5%; margin-left: 5%;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('horarios') }}">Horarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ Route('muelles') }}">Muelles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ Route('gestores') }}">Gestores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link "  href="{{ Route('clientes') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('vehiculos') }}">Vehiculos</a>
        </li>
    </ul>
</div>
<br>
<div class="uper">

<h4>Gestores</h4>
<p>
A continuación se muestra una tabla con la información de los gestores de los muelles.
</p>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr bgcolor="#003865" style="color: #FFFFFF;" align="center">
          <td>ID</td>
          <td>ID Usuario</td>
          <td>Horario</td>

          <td colspan="2"><a href="{{ url('gestores/create') }}" class="btn btn-success btn-block"> Añadir Gestor</a></td>
        </tr>
    </thead>
    <tbody>
        @foreach($gestores as $gestor)
        <tr>
            <td>{{$gestor->id}}</td>
            <td>{{$gestor->user_id}}</td>
            <td>{{$gestor->horario}}</td>

            <td><a href="{{ route('gestores.edit',$gestor->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('gestores.destroy', $gestor->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
