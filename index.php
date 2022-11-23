<?php
include("cnn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/index.css">

</head>

<body class="m-5">
    <header class="d-grid mb-5">
        <div class="row">
            <div class="col">
                <h1>Noticias</h1>
                <small><?php echo "Fecha $day de $months[$month]" ?></small>
            </div>
            <div class="col d-sm-flex flex-row-reverse">
                <a href="admin.php" type="button" class="btn btn-warning btn-sm my-3">Administración</a>
            </div>
        </div>
    </header>
    <main>
        <div class="row d-flex">
            <article class="col-md-7 p-0 px-md-2">
                <section class="rounded p-2">
                    <h2>Noticias recientes</h2>
                    <hr>
                    <div id="recentnewsCarousel" class="carousel slide rounded" data-ride="carousel">
                        <div class="carousel-inner text-center">
                            <?php
                            $sql = "SELECT titulo, imagen FROM tabla_noticia ORDER BY fecha DESC LIMIT 3    ;";
                            $result = mysqli_query($conexion, $sql);
                            $active = "active";
                            while ($mostrar = mysqli_fetch_array($result)) {
                                echo "<div class='carousel-item $active'>";
                                echo "  <div class='image-container my-2 rounded'>";
                                echo "      <img class='img-fluid rounded-top' src='assets/img/$mostrar[1]' alt=''>";
                                echo "  </div>";
                                echo "  <div class='titulo-container text-start'>";
                                echo "      <h4 class='p-1'>$mostrar[0] </h4>";
                                echo "  </div>";
                                echo "</div>";
                                $active = "";
                            }
                            ?>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#recentnewsCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#recentnewsCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </section>
            </article>
            <aside class="col-md-5 my-3 my-md-0 rounded p-2 px-md-2">
                <h2>Otras Noticias</h2>
                <?php
                $sql = "SELECT titulo, imagen FROM tabla_noticia WHERE categoria NOT IN ('Deportes', 'Politica') ORDER BY fecha DESC LIMIT 3;";
                $result = mysqli_query($conexion, $sql);
                while ($mostrar = mysqli_fetch_array($result)) {
                    echo "<hr>";
                    echo "<div class='row-md d-md-flex'>";
                    echo "  <div class='col-md m-1'>";
                    echo "      <div class='card'>";
                    echo "          <div class='card-body'>";
                    echo "              <h4 class='card-title cutlines'>$mostrar[0]</h5>";
                    echo "              <small>Hace 1 horas</small>";
                    echo "          </div>";
                    echo "      </div>";
                    echo "  </div>";
                    echo "</div>";
                }
                ?>
            </aside>
        </div>
        <hr>
        <div class="row">
            <article class="col-md-6 p-0 px-md-2">
                <section class="p-2 rounded" id="">
                    <h2>Deportes</h2>
                    <div id="deportes">
                        <?php
                        $sql = "SELECT titulo, imagen, fecha FROM tabla_noticia WHERE LOWER(categoria) = 'deportes' ORDER BY fecha DESC LIMIT 3;";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_array($result)) {
                            echo "<hr>";
                            echo "<div class='row p-1'>";
                            echo "  <div class='col-3 d-flex flex-column justify-content-center'>";
                            echo "      <img class='small-square rounded' src='assets/img/$mostrar[imagen]' alt=''>";
                            echo "  </div>";
                            echo "  <div class='col'>";
                            echo "      <h4 class='cutlines'>$mostrar[titulo]</h4>";
                            echo "      <small>$mostrar[2]</small>";
                            echo "  </div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center p-1">
                        <div class="col d-flex justify-content-center ">
                            <button type="button" class="btn btn-light btn-sm btn-block" onclick="update('deportes')"> Ver más</button>
                        </div>
                    </div>
                </section>
            </article>
            <hr class="d-md-none my-3">
            <article class="col-md-6 p-0 px-md-2">
                <section class="p-2 rounded">
                    <h2>Política</h2>
                    <div id="politica">
                        <?php
                        $sql = "SELECT titulo, imagen, fecha FROM tabla_noticia WHERE LOWER(categoria) = 'politica' ORDER BY fecha DESC LIMIT 3;";
                        $result = mysqli_query($conexion, $sql);
                        while ($mostrar = mysqli_fetch_array($result)) {
                            echo "<hr>";
                            echo "<div class='row p-1'>";
                            echo "  <div class='col-3 d-flex flex-column justify-content-center'>";
                            echo "      <img class='small-square rounded' src='assets/img/$mostrar[1]' alt=''>";
                            echo "  </div>";
                            echo "  <div class='col'>";
                            echo "      <h4 class='cutlines'>$mostrar[0]</h4>";
                            echo "      <small>$mostrar[2]</small>";
                            echo "  </div>";
                            echo "</div>";
                        }
                        ?>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center p-1">
                        <div class="col d-flex justify-content-center ">
                            <button type="button" class="btn btn-light btn-sm btn-block" onclick="update('politica')"> Ver más</button>
                        </div>
                    </div>

                </section>
            </article>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>