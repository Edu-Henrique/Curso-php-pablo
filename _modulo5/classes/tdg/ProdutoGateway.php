<?php

class ProdutoGateway
{
    private static $conn;
    public static function setConnection(PDO $conn)
    {
        self::$conn = $conn;
    }
    public function find($id, $class = "stdClass")
    {
        $sql = "SELECT * FROM PRODUTO WHERE ID = '{$id}'";
        echo "{$sql} <br>";
        $result = self::$conn->query($sql);
        return $result->fetchObject($class);
    }

    public function all($filter = '', $class = "stdClass")
    {
        $sql = "SELECT * FROM PRODUTO ";
        if ($filter){
            $sql .= " WHERE {$filter}";
        }
        echo "{$sql} <br>";
        $result = self::$conn->query($sql);
        return $result->fetchAll(PDO::FETCH_CLASS, $class);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM PRODUTO WHERE ID = '$id'";
        echo "{$sql} <br>";
        return self::$conn->query($sql);
    }

    public function save($data)
    {
        if(empty($data->id)){
            $sql = "INSERT INTO PRODUTO (ID, DESCRICAO, ESTOQUE, PRECO_CUSTO, PRECO_VENDA, CODIGO_BARRAS, DATA_CADASTRO, ORIGEM)
                    VALUES (DEFAULT, '{$data->descricao}', '{$data->estoque}', '{$data->preco_custo}', '{$data->preco_venda}',
                            '{$data->codigo_barras}', '{$data->data_cadastro}', '{$data->origem}')";
        } else{
            $sql = "UPDATE PRODUTO SET DESCRICAO     = '{$data->descricao}',
                                       ESTOQUE       = '{$data->estoque}',
                                       PRECO_CUSTO   = '{$data->preco_custo}',
                                       PRECO_VENDA   = '{$data->preco_venda}',
                                       CODIGO_BARRAS = '{$data->codigo_barras}',
                                       DATA_CADASTRO = '{$data->data_cadastro}',
                                       ORIGEM        = '{$data->origem}' WHERE ID = '{$data->id}'";
        }
        echo "{$sql} <br>";
        return self::$conn->exec($sql);
    }
}