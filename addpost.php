<?php
    include "BD.php";

    $sql = "select * from tipopost;";


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style2.css">
    <title>PROJETO</title>
</head>
<body>

    <header>Novo Post</header>
    <main>
        <div >
            <form action="posts.php" method="post" enctype="multipart/form-data">
                <div class="preview">
                    <img id="file-ip-1-preview">
                </div>

                <input type="text" name="post" placeholder=" " required><br>

                <input type="file" name="foto" id="foto" onchange="showPreview(event)"><br><br>
                <script>
                    function showPreview(event){
                        if(event.target.files.length > 0){
                            var src = URL.createObjectURL(event.target.files[0]);
                            var preview = document.getElementById("file-ip-1-preview");
                            preview.src = src;
                            preview.style.display = "block";
                        }
                    }   
                   
                </script>
                

                <?php $combo = "<select name='tipopost' id='postss'>";
                    if ($resultado = $con -> query($sql)) {
                        while ($linha = $resultado->fetch_object()) {
                            $idtipoPost = $linha->idtipoPost;
                            $combo .= "<option value='$idtipoPost'>$linha->tipo</option>";
                        }
                        $combo .= "</select><br>";
                        echo $combo;
                    }
                ?>
                <input type="text" name="titulo" placeholder="Titulo" required><br>
                <input type="text" name="subtitulo" placeholder="Subtitulo" required><br>
                <input type="submit" value="Cadastrar">
                
            </form>
        </div>
    </main>


</body>
</html>
