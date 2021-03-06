<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: GET");

    require_once "./../database/connect.php";
    require_once "./../config.php";

    try {
        $resultado = $connect->query('SELECT reservaciones.id, reservaciones.cantidad, reservaciones.fecha, productos.nombre as producto, empleados.nombres as empleado FROM reservaciones
        INNER JOIN productos ON productos.id = reservaciones.id_producto
        INNER JOIN empleados ON empleados.id = reservaciones.id_empleado')->fetchAll(PDO::FETCH_ASSOC);

        $data = [];
        foreach ($resultado as $row) {
            $sub_array = $row;
            // $sub_array['acciones'] = "
            //     <a href='".PUBLIC_PATH."/reservacion/eliminar.php/?id=" .  $row['id'] . "'><button class='btn btn-danger btn-sm mr-2'><i class='fas fa-trash'></i></button></a>

            // ";
            $data[] = $sub_array;
        }
    
        $repuesta = [
            "data" => $data
        ];
    
        echo json_encode($repuesta);
    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }

