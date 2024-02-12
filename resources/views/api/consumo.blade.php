@extends('adminlte::page')

@section('title', 'dashboard')

@section('content_header r')
    <h1>dashboard</h1>
@stop

@section('css')
    <style>
        .card-header {
            height: 100%;
        }

        .card-container {
            margin-bottom: 20px;
            /* Ajusta el valor según sea necesario */
            height: 80%;
        }

        .btn {
            margin-left: 5%;
            margin-bottom: 10px;
        }
    </style>
@stop

@section('content')
    <div style="text-align: center">
        <h1>Api</h1>
    </div>
    <br>

    <div class="row">
        @foreach ($data['game_indices'] as $gameIndex)
            <div class="col-md-4">
                <div class="card card-container">
                    <div class="card-header">
                        <h3 class="card-title">Nombre: {{ $gameIndex['version']['name'] }}</h3>
                        <div class="card-tools">
                            {{-- <span class="badge badge-primary"> Poder: </span> --}}
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <a href="">ID: {{ $gameIndex['game_index'] }}</a>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <a href="{{ $gameIndex['version']['url'] }}" target="_blank"> {{ $gameIndex['version']['url'] }}</a> <br>
                    
                    </div>
                    <!-- /.card-footer -->
                    
                </div>
            </div>
        @endforeach
    </div>
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            $('.eliminar').submit(function(event) {
                event.preventDefault();

                var form = $(this);

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            url: form.attr('action'),
                            data: form.serialize(),
                            success: function(response) {
                                Swal.fire({
                                    title: "Deporte eliminado",
                                    text: "La página se recargará en breve",
                                    icon: "success"
                                }).then(function() {
                                    location.reload();
                                });
                            },
                            error: function(xhr, status, error) {
                                Swal.fire({
                                    title: "Error",
                                    text: "Hubo un problema al procesar la solicitud.",
                                    icon: "error"
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@stop
