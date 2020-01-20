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
          <a class="nav-link active" href="{{ Route('reservasCliente') }}">Mis reservas</a>
        </li>
        <li class="nav-item">
</div>
<br>
<div class="uper">

<h4>Reservas</h4>
<p>
A continuación se muestra una tabla con la información de las reservas realizadas.
</p>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr bgcolor="#003865" style="color: #FFFFFF;" align="center">
          <td>Entrada</td>
          <td>Salida</td>
          <td>Tipo de Operación</td>
          <td colspan="2"><a href="{{ url('reservasCliente/create') }}" class="btn btn-success btn-block"> Añadir Reserva</a></td>
        </tr>
    </thead>
    <tbody>
        @foreach($reservas as $reserva)
        <tr align="center">
            <td>{{$reserva->horario_entrada}}</td>
            <td>{{$reserva->horario_salida}}</td>
            <td>{{$reserva->muelle->tipo_operacion}}</td>

            <td>
                <form action="{{ route('reservasCliente.destroy', $reserva->id)}}" method="post">
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
