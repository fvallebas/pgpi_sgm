

<!-- create.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Crear Gestores
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
      <form method="post" >
          <div class="form-group">
              <label for="quantity"> horario :</label>
              <input type="text" class="form-control" name="horario"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear Gestor</button>
      </form>
  </div>
</div>
@endsection
