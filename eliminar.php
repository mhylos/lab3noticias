<?php
    include("cnn.php"); //incluimos la conexión
    $id = $_GET['id'];
    //Insertamos los datos con lo que conseguimos con el método POST
    $sql = "DELETE FROM tabla_noticia WHERE id = '$id'";

    $resultado = mysqli_query($conexion, $sql);
    if (!$resultado) {
        echo "No se ha podido insertar los valores";
    } else {
        header("Location: listado_noticia.php");
    }
?>