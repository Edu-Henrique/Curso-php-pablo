<?php

$dados = $_GET;

if($dados["id"])
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $id = $dados["id"];
    $sql = "DELETE FROM PESSOA WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "Excluido com sucesso!!!";
    }
    else{
        echo "Erro na tentativa de Exclusão";

    }
    mysqli_close($conn);
}