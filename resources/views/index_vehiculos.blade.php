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
        <li class="nav-item">
          <a class="nav-link"  href="{{ Route('reservasAdmin') }}">Reservas</a>
        </li>
    </ul>
</div>
<br>
<div class="uper">

<h4>Vehiculos</h4>
<p>
A continuación se muestra una tabla con la información de los distintos tipos de vehículos que usan los muelles.
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
          <td>Tipo de Vehículo</td>
          <td>Tiempo de Carga</td>
          <td>Tiempo de Descarga</td>
          <td colspan="2"><a href="{{ url('vehiculos/create') }}" class="btn btn-success btn-block"> Añadir Vehículo</a></td>
        </tr>
    </thead>
    <tbody>
        @foreach($vehiculos as $vehiculo)
        <tr align="center">
            <td>{{$vehiculo->id}}</td>
            <td>{{$vehiculo->tipo_vehiculo}}</td>
            <td>{{substr($vehiculo->tiempo_carga,0,-3)}}</td>
            <td>{{substr($vehiculo->tiempo_descarga,0,-3)}}</td>
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
