<?php

$dados = $_POST;


if($dados["codigo"])
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $sql = "UPDATE PESSOA SET NOME      = '{$dados['nome']}',
                              ENDERECO  = '{$dados['endereco']}',
                              BAIRRO    = '{$dados['bairro']}',
                              TELEFONE  = '{$dados['telefone']}',
                              EMAIL     = '{$dados['email']}',
                              ID_CIDADE = {$dados['id_cidade']} WHERE ID = {$dados['codigo']}";

    $result = mysqli_query($conn, $sql);

    if($result)
    {
        echo "Alterado com sucesso!!!";
    }
    else
    {
        echo "Erro da tentativa de alteração";
    }

    mysqli_close($conn);
}