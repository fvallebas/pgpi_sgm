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
    Nuevo Gestor
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
      <form method="post" action="{{ route('gestores.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Usuario: (id de usuario)</label>
              <input type="text" class="form-control" name="user_id"/>
          </div>
          <div class="form-group">
              <label for="price">Horario :</label>
              <input type="text" class="form-control" name="horario"/>
          </div>
          <button type="submit" class="btn btn-primary">Crear Gestor</button>
      </form>
  </div>
</div>
@endsection