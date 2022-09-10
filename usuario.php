<?php
    include "BD.php";

    $idusuario = $_POST['idUser'];
    $idusuario = strip_tags($idusuario);

    $nome = $_POST['nome'];
    $nome = strip_tags($nome);

    $email = $_POST['email'];
    $email = strip_tags($email);
    
    $senha = $_POST['senha'];
    $senha = strip_tags($senha);

    date_default_timezone_set('America/Sao_Paulo');
            $pasta = 'imagens/';
	    #verifica se o usuario escolheu uma imagem no input file
            if ($_FILES["foto"]['error'] == 4){

                echo "<p>O primeiro input não teve um arquivo selecionado</p>";
            }else{
		#separa a extensão do nome do arquivo
                $extensao = pathinfo($_FILES["foto"]['name']);
                $extensao = ".".$extensao["extension"];
		#verifica se é uma extensão q eu quero
                if ( strstr ( '.jpg;.jpeg;.gif;.png', $extensao ) ){
                    #cria um nome p salvar a imagem com esse nome
                    $imagem = $pasta.date("Y-m-d-H-i-s")."_img_perf".$extensao;
	
		    #faz o upload do arquivo no caminho 'imagens/nome_da_imagem_aq'
                    if(move_uploaded_file($_FILES['foto']['tmp_name'], $imagem)){
                        echo "";
                    }else{
                        echo "<p>arquivo inválido<br>Ocorreu um erro ao enviar o arquivo!</p>";
                    }

                }
                
            }

    $nasc = $_POST['nasc'];
    $nasc = strip_tags($nasc);

    $turma = $_POST['turmas'];
    $turma = strip_tags($turma);

    $stmt =$con->prepare("insert into usuario (idusuario, nome, email, senha, foto, dataNascimento, turma_idturma) values(?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssssi", $idusuario, $nome, $email, $senha, $imagem, $nasc, $turma);
    $stmt->execute();

?>

