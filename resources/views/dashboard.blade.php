@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header r')
   <h1>dashboard</h1>
@stop

@section('css')
<style>
    .card-header{
        height: 100%;
    }
    
    .card-container {
        margin-bottom: 20px; /* Ajusta el valor según sea necesario */
        height: 80%;
    }
    .btn{
        margin-left: 5%;
        margin-bottom: 10px;
    }
</style>
@stop

@section('content')
    <div style="text-align: center">
        <h1>Estos son todos los deportes registrados</h1>
    </div>
    <br>

    <div class="row">
        @foreach ($deportes as $deporte)
            <div class="col-md-4">
                <div class="card card-container">    
                    <div class="card-header">
                        <h3 class="card-title">Nombre del deporte:{{$deporte->name}}</h3>
                        <div class="card-tools">
                            <span class="badge badge-primary">Personas inscritas:{{$deporte->personas}}</span>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        Descripción: {{$deporte->descripcion}}
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        ID: {{$deporte->id}}
                    </div>
                    <!-- /.card-footer -->
                    <div class="d-flex" id="btn">
                        <form action="{{ route('dashboard.destroy', $deporte) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger mr-2">Eliminar</button>
                        </form>
                    
                        <form action="" class="d-flex">
                            <button type="submit" class="btn btn-primary">Editar</button>
                        </form>
                    </div>                  
                </div>
            </div>
        @endforeach
    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@stop

@section('js')
   <script> console.log('Hi'); </script>
   
@stop