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
    }
?>