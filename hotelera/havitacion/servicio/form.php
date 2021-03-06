<?php 
    require_once __DIR__ . "/../../usuario/auth.php";
    require_once "./../../database/connect.php";

    $havitacion = $_GET['havitacion'];

    // Datos
    $data;

    // Modo del formulario
    $modo = 'guardar';
    
    // Validacion
    if(isset($_GET['id'])){

        // Obteniedno el id
        $id = $_GET['id'];

        // Realizando la consulta SQL
        $resultado = $connect->query("SELECT * FROM servicios WHERE id = $id")->fetchAll(PDO::FETCH_ASSOC);

        // Obteniedno el item actual
        foreach ($resultado as $row) {
            $data = $row;
        }

        // Cambiar a modo actualizar
        $modo = 'actualizar';
    }

    // Consulta de categorias
    $categorias = $connect->query("SELECT * FROM categorias")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <?php require_once __DIR__ . "/../../partes/head.php" ?>
        <script src="<?php echo PUBLIC_PATH ?>/havitacion/servicio/main.js"></script>
    </head>
    <body>
        <?php require_once "./../../partes/header.php" ?>
        <div class="main-container">
            <div class="card">
                <div class="card-header">
                    Nuevo servicio
                </div>
                <div class="card-body">
                    <form action="<?php echo PUBLIC_PATH ?>/havitacion/servicio/<?= $modo ?>.php" method="post" enctype="multipart/form-data">
                        <?php if ($modo == 'actualizar') {
                            ?>
                                <div style="display:none">
                                    <label for="id">id:</label>
                                    <input type="text" value="<?= $data['id']?>" class="form-control" id="id" name="id">
                                </div>
                            <?php
                        } ?>
                        <div style="display:none">
                            <input type="text" value="<?= $havitacion?>" class="form-control" name="id_havitacion">
                        </div>
                         <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $data['nombre']?>" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="descripcion">descripcion</label>
                                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $data['descripcion']?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="foto">Foto</label>
                            <input type="file" class="form-control-file" id="foto" name="foto">
                        </div>
                        <div class="mb-3">
                            <?php if (!$data['foto'] == ''): ?>
                                <img src="<?= PUBLIC_PATH ?>/<?= $data['foto']?>" alt="<?= $data['numero']?>" width="400">
                            <?php endif ?>
                        </div>
                        <button type="submit" class="btn btn-primary" ><?php echo $modo == 'guardar' ? 'Guardar' : 'Guardar Cambios'?></button>
                        <button type="reset" class="btn btn-secondary">Limpiar</button>
                    </form>
                </div>
            </div>
        </div>   
    </body>
</html>