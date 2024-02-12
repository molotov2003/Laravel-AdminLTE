@extends('adminlte::page')

@section('title', 'Sports')

@section('content_header r')
    <h1>dashboard</h1>
@stop

@section('content')
    <h1 style="text-align: center">Editar Usuarios</h1>

    <form action="{{ route('dashboard.editarUser', $usuario) }}" method="POST" class="formularioCrear" id="formularioCrear">
        @csrf
        @method('put')
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-l1el">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{ $usuario->name }}"
                aria-describedby="emailHelp">
        </div>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descripcion</label>
            <input type="text" name="email" class="form-control" value="{{ $usuario->email }}"
                id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Personas</label>
            <input type="number" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Editar Usuario</button>

    </form>


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@stop
