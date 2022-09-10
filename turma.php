<?php
    include "BD.php";

    $sql = "select * from turma;";
    

    if(!isset($_POST['turma'])){
        die("nome não encontrado");
    }
     
    $id = $_POST['id'];
    $id = strip_tags($id);

    $turma = $_POST['turma'];
    $turma = strip_tags($turma);

    $ano = $_POST['ano'];
    $ano = strip_tags($ano);

    $stmt =$con->prepare("insert into turma (idturma, turma, ano) values(?, ?, ?)");
    $stmt->bind_param("iss", $id, $turma, $ano);
    $stmt->execute();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>PROJETO</title>
</head>
<body>

    <header>Cadastro de usuários</header>
    <main>
        <div class="distancia">
            <form action="usuario.php" method="post" enctype="multipart/form-data">
                <input  type="number" placeholder="ID Usuario" name="idUser" required><br>
                <input type="text" placeholder="Nome" name="nome" required><br>
                <input type="email" placeholder="Email" name ="email" required><br>
                <input type="password" placeholder="Senha" name ="senha" required><br>
                <h6 class="pequeno">Fotos</h6>
                <input type="file" accept="image/*" name ="foto" ><br>
                <input type="date" placeholder="Nascimento" name ="nasc" required><br>
                <?php $combo = "<select name='turmas' id='turmas'>";
                if ($resultado = $con -> query($sql)) {
                    while ($linha = $resultado->fetch_object()) {
                        $idturma = $linha->idturma;
                        $combo .= "<option value='$idturma'>$linha->turma</option>";
                    }
                    $combo .= "</select><br>";
                    echo $combo;
                }?>

                <input type="submit" value="Cadastrar">
                
            </form>
        </div>
    </main>


</body>
</html>