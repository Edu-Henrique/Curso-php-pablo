<?php require_once __DIR__ . "/lista_combo_cidades.php"; ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Cadastro de Pessoas</title>
</head>
<body>
    <form enctype="multipart/form-data" method="post" action="pessoa_save_insert.php">
        <label for="">Código</label>
        <input type="text" name="codigo" readonly="1">
        <label for="">Nome</label>
        <input type="text" name="nome" >
        <label for="">Endereço</label>
        <input type="text" name="endereco" >
        <label for="">Bairro</label>
        <input type="text" name="bairro">
        <label for="">Telefone</label>
        <input type="text" name="telefone">
        <label for="">Email</label>
        <input type="text" name="email">
        <label for="">Cidade</label>
        <!-- implementa depois -->

        <select name="id_cidade">
            <?php echo lista_combo_cidades(); ?>
        </select>
        <input type="submit">

    </form>
</body>
</html>