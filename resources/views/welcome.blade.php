<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Enlaces de Bootstrap del modal -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <!-- Enlace del script local del modal -->
    <script src="resources\js\Modal.js"></script>
    <title>CRUD Firebase</title>
</head>

<body>
    <div class="text-center">
        <h1>CRUD con Firebase y Laravel</h1>
    </div>
    
    @if(session('message'))
    <div class="alert alert-{{session('type')}}">
        {{ session('message') }}
    </div>
    @endif
    <div class="d-flex justify-content-center">
        <button type="button" class="btn btn-primary ml-2 mb-2" data-toggle="modal" data-target="#miModal">Agregar</button>
    </div>

    <!-- Modal Agregar-->
    <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Agregar Articulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_store" action="{{route('store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" class="form-control" name="codigo" id="codigo" placeholder="Ingrese el codigo">
                        </div>
                        <div class="form-group">
                            <label for="descript">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" id="descript" placeholder="Ingrese la descripcion del producto">
                        </div>
                        <div class="form-group">
                            <label for="cant">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cant" placeholder="Ingrese la cantidad">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" form="form_store">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal editar -->
    <div class="modal fade" id="miModaledit" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Editar articulo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="edit_form" action="{{route('update')}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" class="form-control" name="codigo" id="codigo" placeholder="Ingrese el codigo">
                        </div>
                        <div class="form-group">
                            <label for="descript">Descripcion</label>
                            <input type="text" class="form-control" name="descripcion" id="descript" placeholder="Ingrese la descripcion del producto">
                        </div>
                        <div class="form-group">
                            <label for="cant">Cantidad</label>
                            <input type="number" class="form-control" name="cantidad" id="cant" placeholder="Ingrese la cantidad">
                        </div>
                        <input type="hidden" name="id" id="id">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" form="edit_form">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal eliminar -->
    <div class="modal fade" id="miModalDelete" tabindex="-1" role="dialog" aria-labelledby="miModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="miModalLabel">Confirmar Eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Estás seguro de que deseas eliminar este elemento? Esta acción no se puede deshacer.</p>
                </div>
                <form action="" method="post" id="form_delete">
                    @csrf
                    @method('delete')
                </form>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" form="form_delete" class="btn btn-danger" id="confirmarEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="d-flex justify-content-center">
        <div class=" w-75 p-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Codigo</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)

                    <tr>
                        <td>{{ $producto -> codigo }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td>{{ $producto->cantidad }}</td>
                        <td>
                            <button type="button" data-datos="{{$producto->toJson()}}" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#miModaledit">
                                Editar
                            </button>
                            <button type="button" class="btn btn-danger btn-sm btn-delete" data-url="{{route('delete', ['id' => $producto->id])}}" data-toggle="modal" data-target="#miModalDelete">
                                Borrar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const botonesEliminar = document.querySelectorAll('.btn-delete');
        botonesEliminar.forEach(boton => {
            boton.addEventListener('click', function() {
                const url = boton.getAttribute('data-url');
                document.querySelector('#miModalDelete form').setAttribute('action', url);
            });
        });

        const botonesEditar = document.querySelectorAll('.btn-warning');
        botonesEditar.forEach(boton => {
            boton.addEventListener('click', function() {
                const datos = JSON.parse(boton.getAttribute('data-datos'));
                document.querySelector('#edit_form input[name="codigo"]').value = datos.codigo;
                document.querySelector('#edit_form input[name="descripcion"]').value = datos.descripcion;
                document.querySelector('#edit_form input[name="cantidad"]').value = datos.cantidad;
                document.querySelector('#edit_form input[name="id"]').value = datos.id;
            });
        });
    });
</script>

</html>