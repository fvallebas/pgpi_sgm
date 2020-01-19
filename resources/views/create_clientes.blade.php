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
      <form method="post" action="{{ route('clientes.store') }}">
          <div class="form-group">
              @csrf
              <label for="name">Usuario: (id de usuario)</label>
              <input type="text" class="form-control" name="user_id"/>
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