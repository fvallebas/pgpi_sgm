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
          <a class="nav-link active">Barrera</a>
        </li>
</div>
<br>
<div class="uper">

<h4>Barrera</h4>
<p>
A continuación se muestra un historial de los vehículos detectados por la barrera.
</p>

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr bgcolor="#003865" style="color: #FFFFFF;" align="center">
          <td>Matrícula</td>
          <td>Fecha</td>
          <td>Hora</td>
          <td>Acceso</td>
        </tr>
    </thead>
    <tbody>
        <tr align="center">
          <td>DHL3423</td>
          <td>20/01/2020</td>
          <td>15:23</td>
          <td>Permitido</td>
        </tr>
        <tr align="center">
          <td>JKL9343</td>
          <td>16/01/2020</td>
          <td>10:40</td>
          <td>No Permitido</td>
        </tr>
        <tr align="center">
          <td>UHY3342</td>
          <td>20/01/2020</td>
          <td>20:40</td>
          <td>Permitido</td>
        </tr>
    </tbody>
  </table>
<div>
</div>
@endsection
