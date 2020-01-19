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
    Nuevo Muelle
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
      <form method="post" action="{{ route('muelles.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Tipo de Muelle</label>
              <select class="form-control" id="tipo_operacion" name="tipo_operacion">
              <option>Carga</option>
              <option>Descarga</option>
              </select>
          </div>
          <button type="submit" class="btn btn-primary">Crear Muelle</button>
      </form>
  </div>
</div>
@endsection