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
        <li class="breadcrumb-item active">Prestamo Libros</li>
    </ol>
    <p style="text-align:center;"><?php echo "Fecha Actual: ". date('Y-m-d H:i:s', strtotime(date('Y-m-d H:i:s'). '- 1 days')) ?></p>
    <button type="button" class="btn btn-primary mb-2" onclick="frmPrestamo()">Nuevo <i class="fas fa-plus"></i></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Clientes" style="color:white">Clientes</a></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Libros" style="color:white">Libros</a></button>
    <button type="button" class="btn btn-primary mb-2"><a href="http://localhost/MiniCore/Multas" style="color:white">Multas</a></button>
    <div class="table-responsive">
        <table class="table table-light" id="tblPrestamos">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Código</th>
                    <th>Cliente</th>
                    <th>Libro</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Fecha Entrega</th>
                    <th>Estado</th>
                    <th></th>
                    <th>Verificación</th>
                    <th>Cálculo Multa</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="nuevo_prestamo" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="title">Nuevo Prestamo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmPrestamo">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="codigo">Codigo</label>
                                    <input type="hidden" id="id" name="id">
                                    <input id="codigo" class="form-control" type="text" name="codigo" placeholder="Código"></input>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cliente">Clientes</label>
                                    <select name="cliente" id="cliente" class="form-control">
                                        <?php foreach($data['clientes'] as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="libro">Libros</label>
                                    <select name="libro" id="libro" class="form-control">
                                        <?php foreach($data['libros'] as $row){ ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['nombre']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="desde">Fecha Inicio</label>
                                    <input type="date_time_set" value="<?php echo date('Y-m-d H:i:s'); ?>" id="desde" name="desde">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="hasta">Fecha Fin</label>
                                    <input type="date_time_set" value="<?php echo date('Y-m-d H:i:s'); ?>" id="hasta" name="hasta">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="frmRegistrarPr(event)" id="botoncito">Registrar</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="nuevo_entrega" tabindex="-1" aria-labelledby="Label" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h5 class="modal-title text-white" id="title">Nueva Entrega</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="frmEntrega">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="from-group">
                                    <label for="entrega">Fecha Entrega</label>
                                    <input type="date_time_set" value="<?php echo date('Y-m-d H:i:s'); ?>" id="entrega" name="entrega">
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="registrarLibro(event)" id="botoncito">Registrar</button>
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
