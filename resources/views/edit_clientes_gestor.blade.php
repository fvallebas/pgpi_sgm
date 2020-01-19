<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="py-4" style="margin-right: 5%; margin-left: 5%;">
<div class="card uper">
  <div class="card-header">
    Editar Cliente
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('clientes.update', $cliente->id) }}">
      <div class="form-group">
              @csrf
              @method('PATCH')
          <label for="vehiculo_id">Tipo de Vehículo</label>
          <select class="form-control" id="vehiculo_id" name="vehiculo_id">
          @foreach ($lista_vehiculos as $vehiculo)
              <option value={{$vehiculo->id}}>{{$vehiculo->tipo_vehiculo}}</option>
          @endforeach
          </select>
          </div>
          <div class="form-group">
              <label for="name">Nombre :</label>
              <input type="text" class="form-control" name="name" value="{{$cliente->user->name}}"/>
          </div>
          <div class="form-group">
              <label for="name">Email :</label>
              <input type="text" class="form-control" name="email" value="{{$cliente->user->email}}"/>
          </div>
          <div class="form-group">
              <label for="name">Matrícula :</label>
              <input type="text" class="form-control" name="matricula" value="{{$cliente->matricula}}"/>
          </div>
          <div class="form-group">
              <label for="price">Marca :</label>
              <input type="text" class="form-control" name="marca" value="{{$cliente->marca}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Modelo :</label>
              <input type="text" class="form-control" name="modelo" value="{{$cliente->modelo}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Carga máxima :</label>
              <input type="text" class="form-control" name="carga_max" value="{{$cliente->carga_max}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Cliente</button>
      </form>
  </div>
</div>
</div>
@endsection