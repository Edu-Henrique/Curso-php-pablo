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
        if(!empty($_GET["id"]))
        {
            $id = (int) $_GET["id"];
            $conn = mysqli_connect("localhost","root", "", "poophp");
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
    ?>

    <form enctype="multipart/form-data" method="post" action="pessoa_save_update.php">
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