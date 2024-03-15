<?php

class Pessoa
{
    public static function find($id)
    {
        $conn = new PDO("mysql:dbname=poophp;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("SELECT * FROM PESSOA WHERE ID='{$id}'");
        return $result->fetch();
    }

    public static function delete($id)
    {
        $conn = new PDO("mysql:dbname=poophp;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("DELETE FROM PESSOA WHERE ID = {$id}");
        return $result;
    }

    public static function all()
    {
        $conn = new PDO("mysql:dbname=poophp;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("SELECT * FROM PESSOA ORDER BY ID");
        return $result->fetchAll();
    }

    public static function save($pessoa)
    {
        $conn = new PDO("mysql:dbname=poophp;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($pessoa["id"]))
        {
            $sql = "INSERT INTO PESSOA (ID, NOME, ENDERECO, BAIRRO, TELEFONE, EMAIL, ID_CIDADE)
                        VALUES (DEFAULT, 
                                '{$pessoa['nome']}', 
                                '{$pessoa['endereco']}', 
                                '{$pessoa['bairro']}', 
                                '{$pessoa['telefone']}', 
                                '{$pessoa['email']}', 
                                {$pessoa['id_cidade']})";
        }
        else
        {
            $sql = "UPDATE PESSOA SET NOME      = '{$pessoa['nome']}',
                                      ENDERECO  = '{$pessoa['endereco']}',
                                      BAIRRO    = '{$pessoa['bairro']}',
                                      TELEFONE  = '{$pessoa['telefone']}',
                                      EMAIL     = '{$pessoa['email']}',
                                      ID_CIDADE = {$pessoa['id_cidade']} WHERE ID = {$pessoa['id']}";
        }

        return $conn->query($sql);
    }
}