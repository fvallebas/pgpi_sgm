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
      <form method="post" action="{{ route('vehiculos.update', $vehiculo->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Tipo de Vehículo :</label>
              <input type="text" class="form-control" name="tipo_vehiculo" value="{{$vehiculo->tipo_vehiculo}}"/>
          </div>
          <div class="form-group">
              <label for="price">Tiempo de Carga : (HH:mm:ss)</label>
              <input type="text" class="form-control" name="tiempo_carga" value="{{$vehiculo->tiempo_carga}}"/>
          </div>
          <div class="form-group">
              <label for="quantity">Tiempo de Descarga : (HH:mm:ss)</label>
              <input type="text" class="form-control" name="tiempo_descarga" value="{{$vehiculo->tiempo_descarga}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Vehículo</button>
      </form>
  </div>
</div>
</div>
@endsection