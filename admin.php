<?php
    include 'NoticiasDB.php';

    $bd = new NoticiasDB();
    $query = "SELECT * FROM noticias";
    $bd->start();
    $result = $bd->query($query);
    $bd->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias - Administracion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/table.css">
</head>
<body class="m-5">
    <header class="d-grid mb-5">
        <div>
            <div>
                <h1>Administración de Noticias</h1>
                <small>fecha, 1 de mes</small>
            </div>
        </div>
    </header>
    <main>
        <div class="row rounded py-1">
            <div class="col-7 col-md-3">
                <h2 class="d-none d-md-block">ID</h2>
                <h2 class="d-block d-md-none">Noticia</h2>
            </div>
            <div class="d-none col-md d-md-block">
                <h2>Título</h2>
            </div>
            <div class="d-none d-md-block col-md-2">
                <h2 class="d-none d-md-block">Fecha</h2>
            </div>
            <div class="col-5 col-md-2">
                <h2 class="d-block">Acción</h2>
            </div>
        </div>
        <hr>
        <?php
            while ($row = mysqli_fetch_row($result)) {
                echo '<div class="row " id="'.$row[0].'">';
                    echo '<div class="col-7 col-md-3">';
                        echo '<div class="d-block d-md-none text-truncate">';
                            echo '<span class="d-inline">['.$row[0].'] </span>';
                            echo '<span>'.$row[1].'</span>';
                        echo '</div>';
                        echo '<span class="d-none d-md-block">'.$row[0].'</span>';
                    echo '</div>';
                    echo '<div class="d-none col-md d-md-block">';
                        echo '<span class="crop-text">'.$row[1].'</span>';
                    echo '</div>';
                    echo '<div class="d-none col-md-2 d-md-block">';
                        echo '<span>'.$row[6].'</span>';
                    echo '</div>';
                    echo '<div class="col-5 col-md-2">';
                        echo '<button type="button" class="btn btn-outline-light btn-sm"><i class="bi bi-pencil-square"></i></button>';
                        echo '<button type="button" class="btn btn-danger btn-sm mx-1"><i class="bi bi-trash"></i></button>';
                    echo '</div>';
                echo "</div>";
                echo '<hr class="my-1">';
            }
        ?>
        <button type="button" class="btn btn-secondary btn-sm mt-3">
            <i class="bi bi-plus-square"></i>
            <span>Agregar</span>
        </button>
    </main>
</body>
</html>
