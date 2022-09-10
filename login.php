<?php
    include "BD.php";
    session_start();

    if(!isset($_POST['email'])){
        die("nome não encontrado");
    }
     
    $email = $_POST['email'];
    $email = strip_tags($email);
    
    $senha = $_POST['senha'];
    $senha = strip_tags($senha);

    $select = "select * from usuario  where email = '$email' and senha = '$senha';";
    $verif = "";

    $stmt =$con->prepare($select) ;
    $stmt->execute();

    $result = $stmt->get_result();
    while($linha = $result->fetch_object()){
        $verif = "a";
        $idusuario = $linha->idusuario;
        $nome = $linha->nome;
        $email = $linha->email;
        $senha = $linha->senha;
        $foto = $linha->foto;
        $dataNasc = $linha->dataNascimento;
        $turmaid = $linha->turma_idturma;
    }

    if($verif != ""){
        $_SESSION["EMAIL"] = $email;
        $_SESSION["NOME"] = $nome;
        $_SESSION["SENHA"] = $senha;
        $_SESSION["DATA_N"] = $dataNasc;
        $_SESSION["FOTO"] = $foto;
        $_SESSION["TURMA_ID"] = $turmaid;
        $_SESSION["ID_USER"] = $idusuario;
    }
    header("Location: index.html");

?>

