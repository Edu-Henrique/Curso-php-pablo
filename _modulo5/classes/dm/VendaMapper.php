<?php

class VendaMapper
{
    private static $conn;
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }
    public static function save(Venda $venda)
    {
        $data = date("Y-m-d");
        $sql = "INSERT INTO VENDA (DATA_VENDA) VALUES ('{$data}')";
        echo "{$sql} <br>";
        self::$conn->query($sql);

        $id = self::getLastId();
        $venda->setId($id);

        foreach ($venda->getItens() as $item){
            $quantidade = $item[0];
            $produto    = $item[1];
            $preco      = $produto->preco;
            $sql = "INSERT INTO ITEM_VENDA (ID, ID_PRODUTO, ID_VENDA, QUANTIDADE, PRECO) VALUES 
                    (DEFAULT, '{$produto->id}', '{$id}', '{$quantidade}', '{$preco}')";
            echo "{$sql} <br>";
            self::$conn->query($sql);
        }
    }

    public static function getLastId()
    {
        $sql = "SELECT max(ID) as max FROM VENDA";
        $result = self::$conn->query($sql);
        $data = $result->fetchObject();
        return $data->max;
    }
}