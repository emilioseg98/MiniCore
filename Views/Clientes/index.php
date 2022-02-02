<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="http://localhost/MiniCore/Assets/css/styles.css" rel="stylesheet" />
    <script src="http://localhost/MiniCore/Assets/js/all.min.js" crossorigin="anonymous"></script>
</head>
    <body>
    <ol class="breadcrumb">
        <li class="breadcrumb-item active">Clientes</li>
    </ol>
    <button type="button" class="btn btn-primary mb-2" onclick="frmCustomer()">Nuevo <i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Libros" style="color:white">Libros</a></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Prestamos" style="color:white">Prestamos</a></button>
    <div class="table-responsive">
        <table class="table table-light" id="tblClientes">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>CI</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>Telefono</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="nuevo_cliente" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmCustomer">
                        <div class="from-group">
                            <label for="ci">CI</label>
                            <input type="hidden" id="id" name="id">
                            <input id="ci" class="form-control" type="text" name="ci" placeholder="CI"></input>
                        </div>
                        <div class="from-group">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del Cliente"></input>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea name="direccion" id="direccion" rows="5" placeholder="Direccion" cols="50"></textarea>
                        </div>
                        <div class="from-group">
                            <label for="telefono">Telefono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono"></input>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="frmRegistrarCli(event)" id="botoncito">Registrar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="http://localhost/MiniCore/Assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/MiniCore/Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="http://localhost/MiniCore/Assets/js/scripts.js"></script>
    <script src="http://localhost/MiniCore/Assets/DataTables/dataTables.min.js"></script>
    <script src="http://localhost/MiniCore/Assets/js/sweetalert2.all.min.js"></script>
    <script src="http://localhost/MiniCore/Assets/js/funciones.js"></script>
</body>
</html>