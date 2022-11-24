<?php
    include "../model/Noticias.php";
    session_start();
    $noticiasdb = new NoticiasDB();

    switch($_REQUEST["op"]){
        case 'obtNoticias':
            $result = $noticiasdb->getAll();
            while ($noticia = mysqli_fetch_array($result)) {
                $data[]=array(
                    'id'=>$noticia['id'],
                    'titulo'=>$noticia['titulo'],
                    'fecha'=>$noticia['fecha']);
                $json_data = json_encode($data);
            }
            echo $json_data;   
            break;
            

        case 'obtNoticiaPorId':
            if(isset($_POST['id'])){
                $noticia = $noticiasdb->getById($_POST['id']);
                $data[]=array(
                    'id'=>$noticia[0]['id'],
                    'titulo'=>$noticia[0]['titulo'],
                    'imagen'=>$noticia[0]['imagen'],
                    'resumen'=>$noticia[0]['resumen'],
                    'categoria'=>$noticia[0]['categoria'],
                    'noticia'=>$noticia[0]['noticia'],
                    'fecha'=>$noticia[0]['fecha']
                );
                echo json_encode($data);
            }
            break;

        case 'eliminarNoticiaPorId':
            if(isset($_POST['id'])){
                $noticiasdb->deleteById($_POST['id']);
            }    
        
        case 'editar':
            if(isset($_POST['id'])){
                
                $id = $_POST['id'];
                $titulo = $_POST['titulo'];
                $resumen = $_POST['resumen'];
                $categoria = $_POST['categoria'];
                $noticia = $_POST['noticia'];
                $fecha = $_POST['fecha'];
                if ($_FILES['imagen']["name"] != ""){
                    $img_name = $_FILES["imagen"]["name"];
                    $tmp_name = $_FILES["imagen"]["tmp_name"];
                    $img_size = $_FILES["imagen"]["size"];
                    $error = $_FILES["imagen"]["error"];
                    if ($error === 0){
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png", "webp");
                        if (in_array($img_ex_lc, $allowed_exs)){
                            $noticiasdb->editWithIMG($id, $titulo, $img_name, $resumen, $categoria, $noticia, $fecha);
                            move_uploaded_file($tmp_name, '../assets/img/'.$img_name);
                            echo 1;
                        } else {
                            echo "El archivo no es una imagen";
                        }
                    } else {
                        echo $phpFileError[$error];
                    } 
                } else {
                    $noticiasdb->editWithoutIMG($id, $titulo, $resumen, $categoria, $noticia, $fecha);
                    echo 1;
                }
            }
            break;

        case 'agregar':
            if(isset($_POST['titulo']) && isset($_POST['resumen']) && isset($_POST['categoria']) && isset($_POST['noticia']) && isset($_POST['fecha'])){
                $titulo = $_POST['titulo'];
                $resumen = $_POST['resumen'];
                $categoria = $_POST['categoria'];
                $noticia = $_POST['noticia'];
                $fecha = $_POST['fecha'];
                if ($_FILES['imagen']["name"] != ""){
                    $img_name = $_FILES["imagen"]["name"];
                    $tmp_name = $_FILES["imagen"]["tmp_name"];
                    $img_size = $_FILES["imagen"]["size"];
                    $error = $_FILES["imagen"]["error"];
                    if ($error === 0){
                        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                        $img_ex_lc = strtolower($img_ex);

                        $allowed_exs = array("jpg", "jpeg", "png");
                        if (in_array($img_ex_lc, $allowed_exs)){
                            $noticiasdb->agregar($titulo, $img_name, $resumen, $categoria, $noticia, $fecha);
                            move_uploaded_file($tmp_name, '../assets/img/'.$img_name);
                            echo 1;
                        } else {
                            echo "El archivo no es una imagen";
                        }
                    }
                } else {
                    echo 'falta imagen';
                }
            }
            break;

        case 'load_more':
            $cant = $_POST['cant'];
            $category = $_POST['category'];
            $html = "";
            $sql = "SELECT titulo, imagen, fecha FROM tabla_noticia WHERE LOWER(categoria) = '$category' ORDER BY fecha DESC LIMIT $cant;";
            $result = $noticiasdb -> query($sql);
            while ($noticia = mysqli_fetch_array($result)) {
                $html.="<hr>";
                $html.="<div class='row p-1'>";
                $html.="  <div class='col-3 d-flex flex-column justify-content-center'>";
                $html.="      <img class='small-square rounded' src='assets/img/$noticia[imagen]' alt=''>";
                $html.="  </div>";
                $html.="  <div class='col'>";
                $html.="      <h4 class='cutlines'>$noticia[titulo]</h4>";
                $html.="      <small>$noticia[2]</small>";
                $html.="  </div>";
                $html.="</div>";
            };
            echo $html;

            break;

        case 'buscar':
            $string = $_POST['string'];
            $result = $noticiasdb->buscar($string);
            if (mysqli_num_rows($result) == 0) {
                echo 0;
                break;
            }
            $lista_noticias = array();
            while ($noticia = mysqli_fetch_array($result)) {
                $data[]=array(
                    'id'=>$noticia['id'],
                    'titulo'=>$noticia['titulo'],
                    'fecha'=>$noticia['fecha']);
                $json_data = json_encode($data);
            }
            echo $json_data;   

            break;
    }
