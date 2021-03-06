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
          <a class="nav-link active"  href="{{ Route('clienteGestor') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('reservasGestor') }}">Reservas</a>
        </li>
    </ul>
</div>
<br>
<div class="uper">

<h4>Clientes</h4>
<p>
A continuación se muestra una tabla con la información referente a los clientes que utilizan los muelles.
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
          <td>Nombre</td>
          <td>Email</td>
          <td>Tipo de Vehículo</td>
          <td>Matrícula</td>
          <td>Marca</td>
          <td>Modelo</td>
          <td>Carga Máxima</td>
          <td colspan="2"><a href="{{ url('clienteGestor/create') }}" class="btn btn-success btn-block"> Añadir Cliente</a></td>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr align="center">
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->user->name}}</td>
            <td>{{$cliente->user->email}}</td>
            <td>{{$cliente->vehiculo->tipo_vehiculo}}</td>
            <td>{{$cliente->matricula}}</td>
            <td>{{$cliente->marca}}</td>
            <td>{{$cliente->modelo}}</td>
            <td>{{$cliente->carga_max}}</td>
            <td><a href="{{ route('clienteGestor.edit',$cliente->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('clienteGestor.destroy', $cliente->id)}}" method="post">
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
