@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header r')
   <h1>dashboard</h1>
@stop

@section('content')
  <h1 style="text-align: center">aqui puedes agregar un deporte</h1>

  <form action="{{ route('dashboard.store') }}" method="post">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">descripcion</label>
      <input type="text" name="descripcion" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label"> Cantidad de Personas en el deporte</label>
        <input type="number" name="personas" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary">Crear Deporte</button>
</form>

 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   <script> console.log('Hi'); </script>
@stop

