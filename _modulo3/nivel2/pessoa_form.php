<?php require_once __DIR__ . "/lista_combo_cidades.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Alteração de Pessoas</title>
</head>
<body>

    <?php
        $id        = "";
        $nome      = "";
        $endereco  = "";
        $bairro    = "";
        $telefone  = "";
        $email     = "";
        $id_cidade = "";

        if(!empty($_REQUEST["action"]))
        {
            $conn = mysqli_connect("localhost","root", "", "poophp");
            if($_REQUEST["action"] == "edit")
            {
                if(!empty($_GET["id"]))
                {
                    $id = (int) $_GET["id"];                    
                    $query = "SELECT * FROM PESSOA WHERE ID = {$id}";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);

                    $id        = $row["id"];
                    $nome      = $row["nome"];
                    $endereco  = $row["endereco"];
                    $bairro    = $row["bairro"];
                    $telefone  = $row["telefone"];
                    $email     = $row["email"];
                    $id_cidade = $row["id_cidade"];         
                }
            }
            else if($_REQUEST["action"] == "save")
            {
                $id        = $_POST["codigo"];
                $nome      = $_POST["nome"];
                $endereco  = $_POST["endereco"];
                $bairro    = $_POST["bairro"];
                $telefone  = $_POST["telefone"];
                $email     = $_POST["email"];
                $id_cidade = $_POST["id_cidade"];

                if(empty($_POST["codigo"]))
                {
                    $sql = "INSERT INTO PESSOA (ID, NOME, ENDERECO, BAIRRO, TELEFONE, EMAIL, ID_CIDADE)
                            VALUES (DEFAULT, '{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', {$id_cidade})";            
                    mysqli_query($conn, $sql);
                }
                else{
                    $sql = "UPDATE PESSOA SET NOME      = '{$nome}',
                                              ENDERECO  = '{$endereco}',
                                              BAIRRO    = '{$bairro}',
                                              TELEFONE  = '{$telefone}',
                                              EMAIL     = '{$email}',
                                              ID_CIDADE = {$id_cidade} WHERE ID = {$id}";
                    $result = mysqli_query($conn, $sql);

                    echo ($result) ? "<p>Resgistro Salvo com sucesso!!!</p>" : "<p>Erro na tentadiva de alteração</p>";
                }

            }
            mysqli_close($conn);
        }        
    ?>

    <form enctype="multipart/form-data" method="post" action="pessoa_form.php?action=save">
        <label for="">Código</label>
        <input type="text" name="codigo" readonly="1" value="<?= $id ?>">
        <label for="">Nome</label>
        <input type="text" name="nome" value="<?= $nome ?>">
        <label for="">Endereço</label>
        <input type="text" name="endereco" value="<?= $endereco ?>">
        <label for="">Bairro</label>
        <input type="text" name="bairro" value="<?= $bairro ?>">
        <label for="">Telefone</label>
        <input type="text" name="telefone" value="<?= $telefone ?>">
        <label for="">Email</label>
        <input type="text" name="email" value="<?= $email ?>">
        <label for="">Cidade</label>
        <!-- implementa depois -->

        <select name="id_cidade">
            <?php echo lista_combo_cidades($id_cidade); ?>
        </select>
        <input type="submit">     
    </form>
</body>
</html>