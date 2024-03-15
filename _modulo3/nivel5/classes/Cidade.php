<?php

class Cidade
{  
    public static function all()
    {
        $conn = new PDO("mysql:dbname=poophp;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $result = $conn->query("SELECT * FROM CIDADE ORDER BY NOME");
        return $result->fetchAll();
    }
}