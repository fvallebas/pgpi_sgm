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
      <form method="post" action="{{ route('gestores.update', $gestor->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="name">Nombre :</label>
              <input type="text" class="form-control" name="name" value="{{$gestor->user->name}}"/>
          </div>
          <div class="form-group">
              <label for="name">Email :</label>
              <input type="text" class="form-control" name="email" value="{{$gestor->user->email}}"/>
          </div>
          <div class="form-group">
              <label for="name">Horario :</label>
              <input type="text" class="form-control" name="horario" value="{{$gestor->horario}}"/>
          </div>
          <button type="submit" class="btn btn-primary">Actualizar Gestor</button>
      </form>
  </div>
</div>
</div>
@endsection