<?php
    require_once __DIR__ . "/../usuario/auth.php";
    require_once "./../database/connect.php";

    try {
        // Insertando el estado en la base de datos
        // Preparando la consulta
        $statement =  $connect->prepare("UPDATE estados SET nombre=:nombre WHERE id=:id");

        // Ejecutando la consulta
        $statement->execute([
            ':nombre'       => $_POST['nombre'],
            ':id'       => $_POST['id'],
        ]);

        // Redirecionando al listado de estados
        header('location:' . PUBLIC_PATH . '/estado');

    } catch (Exception $e) {
        // Redireccion si hay algun error
        header('location:' . PUBLIC_PATH . '/505.php?error=' . $e->getMessage());
    }
