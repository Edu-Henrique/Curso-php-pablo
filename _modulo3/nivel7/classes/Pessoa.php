<?php

class Pessoa
{

    private static $conn;

    public static function getConnection()
    {
        if(empty(self::$conn))
        {
            $ini = parse_ini_file("config/livro.ini");
            $host = $ini["host"];
            $name = $ini["name"];
            $user = $ini["user"];
            $pass = $ini["pass"];
            self::$conn = new PDO("mysql:dbname={$name};host={$host};user={$user};password={$pass}");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }        
        return self::$conn;
    }

    public static function find($id)
    {        
        $conn = self::getConnection();
        $result = $conn->prepare("SELECT * FROM PESSOA WHERE ID=:id");
        $result->execute([":id" => $id]);
        return $result->fetch();
    }

    public static function delete($id)
    {
        $conn = self::getConnection();
        $result = $conn->prepare("DELETE FROM PESSOA WHERE ID = :id");
        $result->execute([":id" => $id]);
        return $result;
    }

    public static function all()
    {
        $conn = self::getConnection();
        $result = $conn->query("SELECT * FROM PESSOA ORDER BY ID");
        return $result->fetchAll();
    }

    public static function save($pessoa)
    {
        $conn = self::getConnection();

        if(empty($pessoa["id"]))
        {
            $sql = "INSERT INTO PESSOA (ID, NOME, ENDERECO, BAIRRO, TELEFONE, EMAIL, ID_CIDADE)
                        VALUES (:id, 
                                :nome, 
                                :endereco, 
                                :bairro, 
                                :telefone, 
                                :email, 
                                :id_cidade)";
            $pessoa["id"] = "DEFAULT";
        }
        else
        {
            $sql = "UPDATE PESSOA SET NOME      = :nome,
                                      ENDERECO  = :endereco,
                                      BAIRRO    = :bairro,
                                      TELEFONE  = :telefone,
                                      EMAIL     = :email,
                                      ID_CIDADE = :id_cidade WHERE ID = :id";
        }        
        $result = $conn->prepare($sql);
        $result->execute([
            ":id"        => $pessoa['id'],
            ":nome"      => $pessoa['nome'],
            ":endereco"  => $pessoa['endereco'],
            ":bairro"    => $pessoa['bairro'],
            ":telefone"  => $pessoa['telefone'],
            ":email"     => $pessoa['email'],
            ":id_cidade" => $pessoa['id_cidade']
        ]);        
    }
}