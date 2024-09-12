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
        <h1>Crud sencillo con Firebase y Laravel</h1>
    </div>

    <div >
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
                    <form id="miFormulario">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" class="form-control" id="codigo" placeholder="Ingrese el codigo">
                        </div>
                        <div class="form-group">
                            <label for="descript">Descripcion</label>
                            <input type="text" class="form-control" id="descript" placeholder="Ingrese la descripcion del producto">
                        </div>
                        <div class="form-group">
                            <label for="cant">Cantidad</label>
                            <input type="number" class="form-control" id="cant" placeholder="Ingrese la cantidad">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="guardarDatos()">Guardar</button>
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
                    <form id="miFormulario">
                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" class="form-control" id="codigo" placeholder="Ingrese el codigo">
                        </div>
                        <div class="form-group">
                            <label for="descript">Descripcion</label>
                            <input type="text" class="form-control" id="descript" placeholder="Ingrese la descripcion del producto">
                        </div>
                        <div class="form-group">
                            <label for="cant">Cantidad</label>
                            <input type="number" class="form-control" id="cant" placeholder="Ingrese la cantidad">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="editarDatos()">Guardar</button>
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmarEliminar">Eliminar</button>
                </div>
            </div>
        </div>
    </div>


    <div style="height: 80">
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
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#miModaledit">
                            Editar
                        </button>
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#miModalDelete">
                            Borrar
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>