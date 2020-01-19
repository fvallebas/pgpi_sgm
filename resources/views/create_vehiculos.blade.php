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
    Nuevo Vehículo
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
      <form method="post" action="{{ route('vehiculos.store') }}">
          <div class="form-group">
          @csrf
              <label for="price">Tipo de Vehículo :</label>
              <input type="text" class="form-control" name="tipo_vehiculo"/>
          </div>
          <div class="form-group">
              <label for="quantity">Tiempo de Carga : (HH:mm)</label>
              <input type="time" class="form-control" name="tiempo_carga"/>
          </div>
          <div class="form-group">
              <label for="quantity">Tiempo de Descarga : (HH:mm)</label>
              <input type="time" class="form-control" name="tiempo_descarga"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear Vehículo</button>
      </form>
  </div>
</div>
@endsection