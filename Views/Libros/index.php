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
        <li class="breadcrumb-item active">Libros</li>
    </ol>
    <button type="button" class="btn btn-primary mb-2" onclick="frmBook()">Nuevo <i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Clientes" style="color:white">Clientes</a></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Prestamos" style="color:white">Prestamos</a></button>
    <div class="table-responsive">
        <table class="table table-light" id="tblLibros">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="nuevo_libro" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="title">Nuevo Libro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmBook">
                        <div class="from-group">
                            <label for="nombre">Nombre</label>
                            <input type="hidden" id="id" name="id">
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre del Libro"></input>
                        </div>
                        <div class="form-group">
                            <label for="autor">Autor</label>
                            <textarea name="autor" id="autor" rows="5" placeholder="Autor" cols="50"></textarea>
                        </div>
                        <div class="from-group">
                            <label for="editorial">Editorial</label>
                            <input id="editorial" class="form-control" type="text" name="editorial" placeholder="Editorial"></input>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="frmRegistrarLib(event)" id="botoncito">Registrar</button>
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