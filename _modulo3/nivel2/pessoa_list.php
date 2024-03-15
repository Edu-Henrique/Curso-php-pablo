<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/form.css">
    <title>Lista de Pessoas</title>
</head>
<body>
    <table border="1">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td>Id</td>
                <td>Nome</td>
                <td>Endereco</td>
                <td>Bairro</td>
                <td>Telefone</td>                
            </tr>
        </thead>        
        <tbody>
            <?php
                $conn = mysqli_connect("localhost", "root", "", "poophp");

                if(!empty($_GET["action"]) and $_GET["action"] == "delete")
                {
                    $id = (int) $_GET["id"];                    
                    mysqli_query($conn, "DELETE FROM PESSOA WHERE ID={$id}");
                }

                $query = "SELECT * FROM PESSOA ORDER BY ID";
                $result = mysqli_query($conn, $query);
                
                while($row = mysqli_fetch_assoc($result))
                {

                    $id        = $row["id"];
                    $nome      = $row["nome"];
                    $endereco  = $row["endereco"];
                    $bairro    = $row["bairro"];
                    $telefone  = $row["telefone"];
                    $email     = $row["email"];
                    $id_cidade = $row["id_cidade"];

                    echo "<tr>";
                    echo "<td><a href='pessoa_form.php?action=edit&id={$id}'><img src='img/icon_edit.svg' alt='alterar {$nome}' width='20px'></a></td>";
                    echo "<td><a href='pessoa_list.php?action=delete&id={$id}'><img src='img/icon_remove.svg' alt='remover {$nome}' width='20px'></a></td>";
                    echo "<td>{$id}</td>";
                    echo "<td>{$nome}</td>";
                    echo "<td>{$endereco}</td>";
                    echo "<td>{$bairro}</td>";
                    echo "<td>{$telefone}</td>";                    
                    echo "</tr>";
                }

                mysqli_close($conn);
            ?>
        </tbody>        
    </table>
    <button onclick="window.location='pessoa_form.php'">
        <img src="img/icon_insert.svg" alt="Inserir" width="15px">Inserir
    </button>
</body>
</html>