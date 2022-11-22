<?php
    $conexion = new mysqli("localhost", "root", "", "noticias"); //Establecemos conexión

    if ($conexion -> connect_error){
        die("Conexión fallida: " . $conexion -> connect_error);  
    }

    //Fecha y Hora
    date_default_timezone_set('America/Santiago');
    $months = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $day = date("d");
    $month = date("m") - 1;
    $current_hour = date("G");
    
    // CREANDO LA BASE DE DATOS noticias
    // $sql = "CREATE DATABASE noticias";
    // if ($conexion -> query($sql) === true){
    //     echo "Se ha creado la base de datos";
    // } else{
    //     die("Error en crear la base de datos" . $conexion -> connect_error);
    // }


    // CREANDO LA TABLA tabla_noticia
    // $sql = "CREATE TABLE tabla_noticia(
    //     id INT(11) AUTO_INCREMENT PRIMARY KEY,
    //     titulo VARCHAR(100) NOT NULL,
    //     imagen VARCHAR(1000) NOT NULL,
    //     resumen VARCHAR(1000) NOT NULL,
    //     noticia VARCHAR(4000) NOT NULL,
    //     fecha DATE,
    //     categoria VARCHAR(50) NOT NULL DEFAULT Otra Categoria,
    //     )";

    // if ($conexion -> query($sql) === true){
    //     echo "Se ha creado la tabla";
    // } else{
    //     die("No se ha creado la tabla");
    // }
