<?php
include("cnn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Noticia</title>

    <!-- FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css"> -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">
</head>

<body>
    <a href="listado_noticia.php" type="button" class="btn btn-warning btn-sm my-3">Administración</a>
    <br>
    <br>
    <?php

    // $id = $_GET['id'];

    // $sql = "SELECT * FROM tabla_noticia where id ='".$id."'";
    // $resultado = mysqli_query($conexion, $sql);
    // $fila = mysqli_fetch_assoc($resultado);
    // $titulo = $fila['titulo'];
    // $imagen = $fila['imagen'];
    // $resumen = $fila['resumen'];
    // $noticia = $fila['noticia'];
    // $fecha = $fila['fecha'];

    // mysqli_close($conexion);
    $id = $_GET['id'];
    $titulo = $_GET['titulo'];
    $imagen = $_GET['imagen'];
    $resumen = $_GET['resumen'];
    $noticia = $_GET['noticia'];
    $fecha = $_GET['fecha'];

    ?>
    <h1 class="text-center">Editar Noticia</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Formulario para editar valores en nuestra tabla de la base de datos -->
                <form action="editar.php" method="POST">
                    <table class="table table-bordered table-striped table-responsive table-hover">
                        <tr>
                            <td>ID</td>
                            <td><input type="text" name="id" style="width: 100%;" value="<?= $id ?>" readonly></td>
                        </tr>
                        <tr>
                            <td>Título</td>
                            <td><input type="text" name="titulo" style="width: 100%" value="<?= $titulo ?>"></td>
                        </tr>
                        <tr>
                            <td>Imagen</td>
                            <td><input type="text" name="imagen" style="width: 100%" value="<?= $imagen ?>"></td>
                        </tr>
                        <tr>
                            <td>Resumen</td>
                            <td><input type="text" name="resumen" style="width: 100%" value="<?= $resumen ?>"></td>
                        </tr>
                        <tr>
                            <td>Noticia</td>
                            <td><input type="text" name="noticia" style="width: 100%" value="<?= $noticia ?>"></td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input type="text" name="fecha" style="width: 100%" value="<?= $fecha ?>"></td>
                        </tr>
                    </table>
                    <center><input type="submit" value="Guardar" class="btn btn-primary"></center>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>