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
          <a class="nav-link" href="{{ Route('gestores') }}">Gestores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"  href="{{ Route('clientes') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ Route('vehiculos') }}">Vehiculos</a>
        </li>
    </ul>
</div>
<br>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Tipo de Vehículo</td>
          <td>Tiempo de Carga</td>
          <td>Tiempo de Descarga</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($vehiculos as $vehiculo)
        <tr>
            <td>{{$vehiculo->id}}</td>
            <td>{{$vehiculo->tipo_vehiculo}}</td>
            <td>{{$vehiculo->tiempo_carga}}</td>
            <td>{{$vehiculo->tiempo_descarga}}</td>
            <td><a href="{{ route('vehiculos.edit',$vehiculo->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('vehiculos.destroy', $vehiculo->id)}}" method="post">
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
