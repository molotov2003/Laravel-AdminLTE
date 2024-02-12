@extends('adminlte::page')

@section('title', 'Sports')

@section('content_header r')
    <h1>dashboard</h1>
@stop

@section('content')
    <h1 style="text-align: center">Agrega Un Usuario</h1>

    <form action="{{ route('dashboard.CrearUsuario') }}" method="post" class="formularioCrear" id="formularioCrear">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">name</label>
            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        @error('name')
            <span>{{ $message }}</span>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Email</label>
            <input type="text" name="email" class="form-control" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Contraseña</label>
            <input type="number" name="password" class="form-control " id="exampleInputEmail1"
                aria-describedby="emailHelp">
        </div>
        <button type="submit" class="btn btn-primary">Crear Usuario</button>

    </form>


@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('#formularioCrear').submit(function(e) {
                e.preventDefault();

                // Obtén los datos del formulario
                var formData = $(this).serialize();

                // Realiza la solicitud Ajax al controlador
                $.ajax({
                    type: 'POST',
                    url: '{{ route('dashboard.CrearUsuario') }}',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        console.log(response); // Ver la respuesta en la consola
                        if (response.success) {
                            // Manejar el éxito
                            Swal.fire({
                                title: "¡Buen trabajo!",
                                text: "¡Hiciste clic en el botón!",
                                icon: "success"
                            }).then(function() {
                                // Recargar la página después de cerrar el SweetAlert
                                console.log("Recargando página");
                                window.location.reload();
                            });
                        } else {
                            // Manejar el error
                            Swal.fire({
                                title: "Error",
                                text: "Hubo un problema al insertar el usuario. Detalles: " +
                                    response.error,
                                icon: "error"
                            });
                        }
                        windows.location.reload()
                    },
                    error: function(xhr, status, error) {
                        // Manejar otros errores del servidor
                        Swal.fire({
                            title: "Error",
                            text: "Hubo un problema al procesar la solicitud.",
                            icon: "error"
                        });
                    }
                });
            });
        });
    </script>
@stop
