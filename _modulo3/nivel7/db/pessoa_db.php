<?php

function get_pessoa($id)
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $result = mysqli_query($conn, "SELECT * FROM PESSOA WHERE ID = {$id}");
    $pessoa = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $pessoa;
}

function excluir_pessoa($id)
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $result = mysqli_query($conn, "DELETE FROM PESSOA WHERE ID = {$id}");    
    mysqli_close($conn);
    return $result;
}

function insert_pessoa($pessoa)
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $sql = "INSERT INTO PESSOA (ID, NOME, ENDERECO, BAIRRO, TELEFONE, EMAIL, ID_CIDADE)
            VALUES (DEFAULT, '{$pessoa['nome']}', '{$pessoa['endereco']}', '{$pessoa['bairro']}', '{$pessoa['telefone']}', '{$pessoa['email']}', {$pessoa['id_cidade']})";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function update_pessoa($pessoa)
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $sql = "UPDATE PESSOA SET NOME      = '{$pessoa['nome']}',
                              ENDERECO  = '{$pessoa['endereco']}',
                              BAIRRO    = '{$pessoa['bairro']}',
                              TELEFONE  = '{$pessoa['telefone']}',
                              EMAIL     = '{$pessoa['email']}',
                              ID_CIDADE = {$pessoa['id_cidade']} WHERE ID = {$pessoa['id']}";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function lista_pessoas()
{
    $conn = mysqli_connect("localhost", "root", "", "poophp");
    $result = mysqli_query($conn, "SELECT * FROM PESSOA ORDER BY ID");
    $list = mysqli_fetch_all($result);
    mysqli_close($conn);
    return $list;
}