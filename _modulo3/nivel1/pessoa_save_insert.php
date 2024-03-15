<?php

$dados = $_POST;
$nome = $dados["nome"];
$endereco = $dados["endereco"];
$bairro = $dados["bairro"];
$telefone = $dados["telefone"];
$email = $dados["email"];
$id_cidade = $dados["id_cidade"];

$conn = mysqli_connect("localhost", "root", "","poophp");

$query = "INSERT INTO PESSOA (ID, NOME, ENDERECO, BAIRRO, TELEFONE, EMAIL, ID_CIDADE) 
            VALUES (DEFAULT,'{$nome}', '{$endereco}', '{$bairro}', '{$telefone}', '{$email}', '{$id_cidade}')";
$result = mysqli_query($conn, $query);

if($result)
{
    echo "Cadastrado com sucesso!!!";
}
else
{
    echo "Erro não foi possivel efeturar o cadastro!!!";
}

mysqli_close($conn);