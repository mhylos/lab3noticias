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
    <!-- FONT-->
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
                <small>fecha, 1 de mes</small>
            </div>
            <div class="col d-sm-flex flex-row-reverse">
                <a href="listado_noticia.php" type="button" class="btn btn-warning btn-sm my-3">Administración</a>
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
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="image-container my-2 rounded">
                                    <img class="img-fluid" src="assets/img/social-xi-jinping-invita-boric-visita-china-1200x633.jpg" alt="">
                                </div>
                                <div class="titulo-container">
                                    <h4 class="p-1">Xi Jinping invita a Boric a una visita oficial a China durante 2023
                                    </h4>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="image-container m-1">
                                    <img class="img-fluid rounded-top" src="assets/img/casado_con_hijos.webp" alt="">
                                </div>
                                <div class="titulo-container">
                                    <h4 class="p-1">¡Tras 15 años! Casado con Hijos regresa con nueva temporada y pronto
                                        arrancan las grabaciones</h4>
                                </div>
                            </div>
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
                <hr>
                <div class="row-md d-md-flex">
                    <div class="col-md m-1">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title cutlines">Conductor ebrio atropelló y mató a peatón en avenida de
                                    Arica</h5>
                                    <small>hace 1 hora</small>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="row-md d-md-flex">
                    <div class="col-md m-1">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title cutlines">Avión de Latam sufre accidente en pista de aterrizaje en
                                    aeropuerto de Perú</h5>
                                    <small>hace 2 horas</small>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
        <hr>
        <div class="row">
            <article class="col-md-6 p-0 px-md-2">
                <section class="p-2 rounded">
                    <h2>Deportes</h2>
                    <hr>
                    <div class="row p-1">
                        <div class="col-3 d-flex flex-column justify-content-center">
                            <img class="small-square rounded" src="assets/img/argentina_senegal_lesiones_dias_debut_qatar_2022.jpg?>" alt="">
                        </div>
                        <div class="col">
                            <h4 class="cutlines">Argentina y Senegal sufren por las lesiones a días del debut en Qatar
                                2022</h4>
                            <small>hace 1 hora</small>
                        </div>

                    </div>
                    <hr>
                    <div class="row p-1">
                        <div class="col-3 d-flex flex-column justify-content-center">
                            <img class="small-square rounded" src="assets/img/argentina_senegal_lesiones_dias_debut_qatar_2022.jpg" alt="">
                        </div>
                        <div class="col">
                            <h4 class="cutlines">Argentina y Senegal sufren por las lesiones a días del debut en Qatar
                                2022</h4>
                            <small>hace 1 hora</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center p-1">
                        <div class="col d-flex justify-content-center ">
                            <button type="button" class="btn btn-light btn-sm btn-block"> Ver más</button>
                        </div>
                    </div>

                </section>
            </article>
            <hr class="d-md-none my-3">
            <article class="col-md-6 p-0 px-md-2">
                <section class="p-2 rounded">
                    <h2>Política</h2>
                    <hr>
                    <div class="row p-1">
                        <div class="col-3 d-flex flex-column justify-content-center">
                            <img class="small-square rounded" src="assets/img/social-xi-jinping-invita-boric-visita-china-1200x633.jpg" alt="">
                        </div>
                        <div class="col">
                            <h4 class="cutlines">Xi Jinping invita a Boric a una visita oficial a China durante 2023>
                            </h4>
                            <small>hace 1 hora</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row p-1">
                        <div class="col-3 d-flex flex-column justify-content-center">
                            <img class="small-square rounded" src="assets/img/social-xi-jinping-invita-boric-visita-china-1200x633.jpg" alt="">
                        </div>
                        <div class="col">
                            <h4 class="cutlines">Xi Jinping invita a Boric a una visita oficial a China durante 2023
                            </h4>
                            <small>hace 1 hora</small>
                        </div>
                    </div>
                    <hr>
                    <div class="row d-flex justify-content-center p-1">
                        <div class="col d-flex justify-content-center ">
                            <button type="button" class="btn btn-light btn-sm btn-block"> Ver más</button>
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
</body>

</html>