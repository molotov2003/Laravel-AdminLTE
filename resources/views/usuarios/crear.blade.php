@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header r')
   <h1>dashboard</h1>
@stop

@section('content')
  <h1 style="text-align: center">Agrega Un Usuario</h1>

  <form action="{{route('dashboard.CrearUsuario')}}" method="post"  class="formularioEliminar">
    @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">name</label>
      <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
    </div>
    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Email</label>
      <input type="text" name="email" class="form-control" id="exampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Contraseña</label>
        <input type="number" name="password" class="form-control " id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <button type="submit" class="btn btn-primary" >Crear Usuario</button>
     
    @yield('js')
</form>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
   <script> console.log('Hi'); </script>
 

@stop 

@push('js')
<script src="sweetalert2.all.min.js"></script>
<script>
   $('. formularioEliminar').submit(function(){
    
Swal.fire({
  title: "Good job!",
  text: "You clicked the button!",
  icon: "success"
});
   }
   )
</script>
@endpush 