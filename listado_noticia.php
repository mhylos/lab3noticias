<?php
include("cnn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado Noticia</title>

    <!-- FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <a href="index.php" type="button" class="btn btn-light btn-xl my-3">Inicio</a>
    <br>
    <h1 class="text-center">Listado de Noticias</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="">
                    <form action="buscar_noticia.php" method="POST" class="end">
                        <input type="text" name="buscar">
                        <input type="submit" value="Buscar">
                    </form>
                </div>
                <table class="table table-bordered table-responsive">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Título</td>
                            <td>Imagen</td>
                            <td>Resumen</td>
                            <td>Noticia</td>
                            <td>Fecha</td>
                            <td style="width: 200px">OPCIONES</td>
                        </tr>
                    </thead>
                    <?php
                    // Seleccionamos lo que tenemos en la base de datos para mostrarla en una tabla
                    $sql = "SELECT id, titulo, imagen, resumen, noticia, fecha FROM tabla_noticia order by id desc";
                    $respuesta = mysqli_query($conexion, $sql);
                    while ($mostrar = mysqli_fetch_row($respuesta)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar[0] ?></td> <!--   ID    -->
                            <td><?php echo $mostrar[1] ?></td> <!-- Título  -->
                            <td><?php echo $mostrar[2] ?></td> <!-- Imagen  -->
                            <td><?php echo $mostrar[3] ?></td> <!-- Resumen -->
                            <td><?php echo $mostrar[4] ?></td> <!-- Noticia -->
                            <td><?php echo $mostrar[5] ?></td> <!--  Fecha  -->
                            <td>
                                <a href="editar_noticia.php?
                            id=<?php echo $mostrar[0] ?> &
                            titulo=<?php echo $mostrar[1] ?> &
                            imagen=<?php echo $mostrar[2] ?> &
                            resumen=<?php echo $mostrar[3] ?> &
                            noticia=<?php echo $mostrar[4] ?> &
                            fecha=<?php echo $mostrar[5] ?>
                            " type="button" class="btn btn-info">Editar</a>
                                <a href="eliminar.php? id=<?php echo $mostrar[0] ?>" type="button" class="btn btn-danger">Eliminar</a>
                            </td>
                        </tr>
                    <?php }
                    //Liberamos la memoria del resultado
                    mysqli_free_result($respuesta);
                    ?>
                </table>
                <center><a href="insertar_noticia.php" type="button" class="text-center btn btn-primary">Insertar</a></center>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>