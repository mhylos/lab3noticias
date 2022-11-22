<?php
    include("cnn.php"); //incluimos la conexión
    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $resumen = $_POST['resumen'];
    $noticia = $_POST['noticia'];
    $fecha = $_POST['fecha'];
    //Insertamos los datos con lo que conseguimos con el método POST
    $sql = "INSERT INTO tabla_noticia(titulo, imagen, resumen, noticia, fecha) VALUES('$titulo', '$imagen', '$resumen', '$noticia', '$fecha')";

    $resultado = mysqli_query($conexion, $sql);
    if (!$resultado) {
        echo "No se ha podido insertar los valores";
    } else {
        header("Location: admin.php");
    }
?>