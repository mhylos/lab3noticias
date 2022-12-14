<?php
    include 'model/Noticias.php';

    $bd = new NoticiasDB();
    $query = "SELECT * FROM tabla_noticia";
    // $bd->start();
    $result = $bd->query($query);
    // $bd->close();
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
        <div class="row justify-content-between">
            <div class="col">
                <h1>Administración de noticias</h1>
            </div>
            <div class="col text-start text-sm-end" >
                <a href="index.php" type="button" class="btn btn-secondary btn-sm my-3">Volver</a>
            </div>
        </div>
    </header>
    <main>
        <div class="barra-busqueda d-flex flex-column flex-md-row">
            <div class="input-group mb-3">
                <input id="inputBuscar" type="text" class="form-control" placeholder="Titulo, ID o fecha" aria-label="Buscar" aria-describedby="basic-addon2">
                <button class="btn btn-outline-secondary" type="button" onclick="buscar()">Buscar</button>
            </div>
            <div class="text-center pb-2">
                <button class="btn btn-outline-secondary mx-2" type="button" onclick="rellenar_tabla()">Reset</button>
            </div>
        </div>

        <div class="row rounded py-1" style="background-color: var(--gris-oscuro);">
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
        <div id="contentTable">
        <!--CONTENIDO TABLA-->
        </div>
        <button type="button" class="agregar btn btn-secondary btn-sm mt-3" onclick="agregar()">
            <i class="bi bi-plus-square"></i>
            <span>Agregar</span>
        </button>

        <!--MODAL-->
        <div class="modal fade" id="infoNoticiaModal" tabindex="-1" role="dialog" aria-labelledby="infoNoticia" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-responsive" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitulo">Editar noticia</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group id-group row">
                            <label class="col-3" for="idInput">ID: </label>
                            <input class="col-8" value="" id="idInput" name="id" readonly></input>
                            <hr class="my-3">
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-3" for="tituloTextArea">Titulo: </label>
                            <textarea class="col-8" id="tituloTextArea" rows="3" value="" name="titulo" required></textarea>
                        </div>
                        <div class="form-group row mt-1">
                            <label class="col-3" for="imgInput">Imagen: </label>
                            <div class="d-inline col-8 px-0 d-flex justify-content-center">
                                <label for="imgInput" class="imgPreview d-flex justify-content-center">
                                    <img src="" class="img-fluid rounded"  id="imgPreview" alt="">
                                    <div class="imgPreviewPlaceholder d-flex justify-content-center gap-2">
                                        <img src="assets/icons/image.svg" class="img-fluid" alt="">
                                        <img src="assets/icons/upload.svg" class="img-fluid" alt="">
                                    </div>
                                </label>
                                <input type="file" id="imgInput" class="d-none" accept=".jpg,.png,.jpeg,.webp" name="imagen">
                            </div>
                        </div>
                        <div class="form-group row mt-1">
                            <label class="col-3" for="resumenTextArea">Resumen: </label>
                            <textarea class="col-8" id="resumenTextArea" rows="3" name="resumen" required></textarea>
                        </div>
                        <div class="form-group row mt-1">
                            <label class="col-3" for="inputCat">Categoria</label>
                            <select class="col-8" id="inputCat" name="categoria" required>
                                <option selected>Deportes</option>
                                <option>Politica</option>
                                <option>Accidentes</option>
                                <option>Cientificas</option>
                                <option>Otro</option>
                            </select>
                        </div>
                        <div class="form-group row mt-1">
                            <label class="col-3" for="noticiaTextArea">Noticia: </label>
                            <textarea class="col-8" id="noticiaTextArea" rows="3" name="noticia" required></textarea>
                        </div>
                        <div class="form-group row mt-1 mb-3">
                            <label class="col-3" for="fechaInput">Fecha: </label>
                            <input type="date" class="col-8" id="fechaInput" name="fecha" value="<?php echo date('Y-m-d'); ?>" required></input>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" id="btnGuardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" 
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" 
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" 
        crossorigin="anonymous"></script>
    <script src="js/admin.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.6.10/dist/sweetalert2.all.min.js"></script>
</body>
</html>
