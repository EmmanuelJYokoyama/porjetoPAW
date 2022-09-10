<?php
    include "BD.php";

     
    $titulo = $_POST['titulo'];
    $titulo = strip_tags($titulo);

    $post = $_POST['post'];
    $post = strip_tags($post);

    $subTit = $_POST['subtitulo'];
    $subTit = strip_tags($subTit);

    $momento = $momento.date("Y-m-d H:i:s");

    date_default_timezone_set('America/Sao_Paulo');
    $pasta = 'imagens/';
    if ($_FILES["foto"]['error'] == 4){

        echo "";
    }else{

        $extensao = pathinfo($_FILES["foto"]['name']);
        $extensao = ".".$extensao["extension"];
   
        if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ){
            $imagem = $pasta.date("Y-m-d-H-i-s")."_imgPost".$extensao;

            if(move_uploaded_file($_FILES['foto']['tmp_name'], $imagem)){
                echo "";
            }else{
                echo "";
            }

        }
        
    }

    $tipoPost = $_POST['tipopost'];
    $tipoPost = strip_tags($tipoPost);

    $idpost = "select max(idpost) from post; ";

    if($idpost >= 0){
        $idpost++;
    }else{
        $idpost=1;
    } 
    

    $stmt =$con->prepare("insert into post (idpost, momento, post, titulo, subtitulo, tipoPost_idtipoPost) values(?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssss", $idpost, $momento, $post, $titulo, $subTit, $tipoPost);
    $stmt->execute();
    header("Location: index.html");

?>

