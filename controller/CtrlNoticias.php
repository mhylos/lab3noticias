<?php
    include "../model/Noticias.php";
    session_start();
    $noticiasdb = new NoticiasDB();

    switch($_REQUEST["op"]){
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
                    'fecha'=>$noticia[0]['fecha'],
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

                        $allowed_exs = array("jpg", "jpeg", "png");
                        if (in_array($img_ex_lc, $allowed_exs)){
                            $noticiasdb->editWithIMG($id, $titulo, $img_name, $resumen, $categoria, $noticia, $fecha);
                            move_uploaded_file($tmp_name, '../assets/img/'.$img_name);
                        } else {
                            echo "El archivo no es una imagen";
                        }
                    } else {
                        echo $phpFileError[$error];
                    } 
                } else {
                    $noticiasdb->editWithoutIMG($id, $titulo, $resumen, $categoria, $noticia, $fecha);
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
                        } else {
                            echo "El archivo no es una imagen";
                        }
                    }
                } else {
                    echo 'No se subió imagen';
                }
            }
            break;
    }
?>