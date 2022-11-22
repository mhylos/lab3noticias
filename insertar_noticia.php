<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Noticia</title>

    <!-- FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
<a href="admin.php" type="button" class="btn btn-danger" style="margin: 20px" value="Volver"><i class="bi bi-house"> Administración</i></a>
    <br>
    <br>
    <h1 class="text-center">Insertar Noticia</h1>
    <div class="container">
        <div class="row">
            <div class="col">
                <!-- Formulario para insertar valores en nuestra tabla de la base de datos -->
                <form action="insertar.php"method="POST">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <td>Título</td>
                            <td><input type="text" name="titulo" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Imagen</td>
                            <td><input type="text" name="imagen" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Resumen</td>
                            <td><input type="text" name="resumen" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Noticia</td>
                            <td><input type="text" name="noticia" style="width: 100%"></td>
                        </tr>
                        <tr>
                            <td>Fecha</td>
                            <td><input type="date" name="fecha" style="width: 100%"></td>
                        </tr>
                    </table>
                    <center><input type="submit" value="Guardar" class="btn btn-primary"></center>
                </form>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>