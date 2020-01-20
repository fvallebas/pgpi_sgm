<!-- create.blade.php -->

<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<br>
<div class="uper" style="margin-right: 5%; margin-left: 5%;">
<br>
<div class="card uper">
  <div class="card-header">
    Nuevo Cliente
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
      <form method="post" action="{{ route('clienteGestor.store') }}">
          <div class="form-group">
               @csrf
              <label for="price">Nombre Completo :</label>
              <input type="text" class="form-control" name="name"/>
          </div>
          <div class="form-group">
              <label for="price">Email :</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="price">Contraseña :</label>
              <input type="password" class="form-control" name="password"/>
          </div>
          <div class="form-group">
          <label for="vehiculo_id">Tipo de Vehículo</label>
          <select class="form-control" id="vehiculo_id" name="vehiculo_id">
          @foreach ($lista_vehiculos as $vehiculo)
              <option value={{$vehiculo->id}}>{{$vehiculo->tipo_vehiculo}}</option>
          @endforeach
          </select>
          </div>
          <div class="form-group">
              <label for="price">Matrícula :</label>
              <input type="text" class="form-control" name="matricula"/>
          </div>
          <div class="form-group">
              <label for="quantity">Marca :</label>
              <input type="text" class="form-control" name="marca"/>
          </div>
          <div class="form-group">
              <label for="quantity">Modelo :</label>
              <input type="text" class="form-control" name="modelo"/>
          </div>
          <div class="form-group">
              <label for="quantity">Carga Máxima :</label>
              <input type="text" class="form-control" name="carga_max"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear Cliente</button>
      </form>
  </div>
</div>
@endsection