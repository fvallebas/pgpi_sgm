<!-- index.blade.php -->

@extends('layout')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<br>
<div class="uper" style="margin-right: 5%; margin-left: 5%;">
<div class="py-4" style="margin-right: 5%; margin-left: 5%;">
    <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('horarios') }}">Horarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ Route('muelles') }}">Muelles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('gestores') }}">Gestores</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('clientes') }}">Clientes</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ Route('vehiculos') }}">Vehiculos</a>
        </li>
    </ul>
</div>
<br>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Tipo de Muelle</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($muelles as $muelle)
        <tr>
            <td>{{$muelle->id}}</td>
            <td>{{$muelle->tipo_muelles_id}}</td>

            <td><a href="{{ route('muelles.edit',$muelle->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('muelles.destroy', $muelle->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Borrar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
