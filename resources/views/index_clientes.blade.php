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
          <td>ID Usuario</td>
          <td>Matrícula</td>
          <td>Marca</td>
          <td>Modelo</td>
          <td>Carga Máxima</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($clientes as $cliente)
        <tr>
            <td>{{$cliente->id}}</td>
            <td>{{$cliente->user_id}}</td>
            <td>{{$cliente->matricula}}</td>
            <td>{{$cliente->marca}}</td>
            <td>{{$cliente->modelo}}</td>
            <td>{{$cliente->carga_max}}</td>
            <td><a href="{{ route('clientes.edit',$cliente->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
