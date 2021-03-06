<?php require_once __DIR__ . "/../usuario/auth.php" ?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../partes/head.php" ?>
        <!-- JQuery DataTable Css -->
        <link href="<?php echo PUBLIC_PATH ?>/assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    </head>
    <body class="theme-cyan">
        <?php require_once "./../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="header">
                    <h1>
                        compras
                        <a href="<?php echo PUBLIC_PATH ?>/compra/form.php" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Nuevo
                        </a>
                    </h1>
                </div>
                <div class="body">
                    <table id="example" class="table table-striped table-bordered dataTable" style="width:100%" aria-describedby="example_info">
                        <thead>
                            <tr>
                                <th>medicina</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Fecha Compra</th>
                                <th>Empleado</th>
                                <th>Proveedor</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>medicina</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Fecha Compra</th>
                                <th>Empleado</th>
                                <th>Proveedor</th>
                                
                            </tr>
                        </tfoot>
                    </table>    
                </div>
            </div>
        </div> 
        <?php require_once __DIR__ . "/../partes/footer.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/compra/main.js"></script>
    </body>
</html>