<?php
    include("cnn.php"); //incluimos la conexión
    $id = $_POST['id'];
    $titulo = $_POST['titulo'];
    $imagen = $_POST['imagen'];
    $resumen = $_POST['resumen'];
    $noticia = $_POST['noticia'];
    $fecha = $_POST['fecha'];
    //Insertamos los datos con lo que conseguimos con el método POST
    $sql = "UPDATE tabla_noticia set titulo = '$titulo', imagen ='$imagen', resumen = '$resumen', noticia = '$noticia', fecha = '$fecha' WHERE id = '$id'";
    $resultado = mysqli_query($conexion, $sql);
    if (!$resultado) {
        echo "No se ha podido insertar los valores";
    } else {
        header("Location: listado_noticia.php");
    }
?>