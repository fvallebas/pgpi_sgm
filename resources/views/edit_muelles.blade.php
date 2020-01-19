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
      <form method="post" action="{{ route('muelles.update', $muelle->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Tipo de Muelle :</label>
              <select class="form-control" id="tipo_operacion" name="tipo_operacion">
              <option>Carga</option>
              <option>Descarga</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Muelle</button>
      </form>
  </div>
</div>
</div>
@endsection